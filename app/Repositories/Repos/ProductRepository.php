<?php

namespace App\Repositories\Repos;

use App\Models\Product;
use App\Models\Image;
use App\Models\Order_detail;
use App\Models\Category;
use App\Repositories\Interfaces\ProductInterface;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductRepository implements ProductInterface
{
    public function getAll($keyword, $productQuantity, $permission, $request)
    {
        $product = Product::select('products.*')->orderBy('products.created_at', 'desc');
        if ($keyword != '') {
            $product = $product->where(function($query) use($keyword){
                $query = $query->orWhere('products.name','like','%' . $keyword . '%')->orWhere('products.product_code','like','%' . $keyword . '%');
            });
        }
        if ($permission != 'admin') {
            $product = $product->where('isdisplay', 2);
            $listCategory = [];
            $listColor = [];
            if (isset($request['category'])) {
                $listCategory = $request['category'];
            }
            if (isset($request['color'])) {
                $listColor = $request['color'];
            }
            $product = $product->where(function($query) use($listCategory, $listColor){
                foreach ($listCategory as $key => $value) {
                    $category_id = Category::where('slug',$value)->first();
                    $query = $query->orwhere('category_id',$category_id->id); 
                } 
                foreach ($listColor as $key => $value) {
                    $query = $query->orwhere('color',$value); 
                }
            }); 
        }
        $product = $product->paginate($productQuantity)->appends(request()->query());
        return $product;
    }
    public function addNew($productData)
    {
        $imageExtension = ['jpeg','png','jpg','gif','svg'];
        foreach ($productData['image'] as $key => $value) {
            if (in_array($value->getClientOriginalExtension(), $imageExtension) != 1) {
                return false;
            }
        }
        DB::transaction(function () use($productData) {
            $product = new Product;
            $product->name = $productData['name'];
            $product->slug = Str::slug($productData['name']);
            $product->description = $productData['description'];
            $product->price = $productData['price'];
            $product->promotion = $productData['promotion'];
            $product->product_code = $productData['product_code'];
            $product->isdisplay = $productData['isdisplay'];
            $product->category_id = $productData['category_id'];
            // // $product->created_by = Auth::guard('admin')->user()->id;
            $product->save();
            foreach ($productData['image'] as $key => $value) {
                $imageName = $value->getClientOriginalName();
                $imageExtension = $value->getClientOriginalExtension();
                $imageName = $this->checkImage($imageName, $imageExtension);
                $value->move('images', $imageName);
                $image = new Image;
                $image->product_id = $product->id;
                $image->url = $imageName;
                $image->save();
            }
            return $product;
        });
        return true;
    }
    public function update($productData, $id)
    {
        $product = $this->getById($id); 
        $product->name = $productData['name'];
        $product->slug = Str::slug($productData['name']);
        $product->description = $productData['description'];
        $product->price = $productData['price'];
        $product->promotion = $productData['promotion'];
        $product->product_code = $productData['product_code'];
        $product->isdisplay = $productData['isdisplay'];
        $product->category_id = $productData['category_id'];
        $product->update();
        return $product;
    }
    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $listImage = $this->getListImageById($id);
        $orderDetail = Order_detail::where('product_id', $id)->first();
        if ($orderDetail) {
           return false;
        }
        DB::transaction(function () use($listImage, $product) {
            foreach ($listImage as $key => $value) {
                $image = Image::findOrFail($value->id);
                $image->delete();
            }
            $product->delete();
        });
        return true;
    }
    public function getById($id)
    {
        $product = Product::findOrFail($id);
        return $product;
    }
    public function getIdBySlug($slug, $lang)
    {
        $product = Product::where('slug', $slug)->first();
        return $product->id;
    }
    public function getListImageById($id)
    {
        $images = Image::where('product_id', $id)->get();
        return $images;
    }
    public function checkImage($imagePath, $imageExtension)
    {
        $imageName = pathinfo($imagePath, PATHINFO_FILENAME);
        $path = public_path('images');
        $listImage = scandir($path);
        $i = 1;
        while (in_array($imagePath, $listImage)) {
            $imagePath = $imageName . '_' . $i . '.' . $imageExtension;
            $i++;
        }
        return $imagePath;
    }
    public function deleteImage($id)
    {
        $image = Image::findOrFail($id);
        $imagePath = public_path('images/' . $image->url);
        unlink($imagePath);
        return $image->delete();
    }
    public function addImage($imageData, $productId)
    {
        $imageExtension = ['jpeg','png','jpg','gif','svg'];
        foreach ($imageData as $key => $value) {
            if (in_array($value->getClientOriginalExtension(), $imageExtension) != 1) {
                return false;
            }
        }
        foreach ($imageData as $key => $value) {
            $imageName = $value->getClientOriginalName();
            $imageExtension = $value->getClientOriginalExtension();
            $imageName = $this->checkImage($imageName, $imageExtension);
            $value->move('images', $imageName);
            $image = new Image;
            $image->product_id = $productId;
            $image->url = $imageName;
            $image->save();
        }
        return $image;
    }
    public function getImage($id)
    {
        $image = Image::findOrFail($id);
        return $image;
    }
    public function updateImage($url, $id)
    {
        $imageName = $url->getClientOriginalName();
        $imageExtension = $url->getClientOriginalExtension();
        $imageName = $this->checkImage($imageName, $imageExtension);
        $url->move('images', $imageName);
        $image = Image::findOrFail($id);
        $imagePath = public_path('images/' . $image->url);
        unlink($imagePath);
        $image->url = $imageName;
        return $image->update();
    }
    public function getProductByCategory($categoryId)
    {
        $products = Product::where('category_id', $categoryId)->limit(10)->get();
        return $products;
    }
    public function getProductHome()
    {
        $products = Product::select('products.*')->where('isdisplay', 2)->limit(8)->orderBy('products.created_at', 'desc')->get();
        return $products;
    }
    public function getTypeNameCategoryById($categorId)
    {
        $category = Category::where('id',$categorId)->first();
        return $category->type_name;
    }
}