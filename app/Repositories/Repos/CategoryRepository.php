<?php

namespace App\Repositories\Repos;

use App\Models\Category;
use App\Models\Product;
use App\Repositories\Interfaces\CategoryInterface;
use Illuminate\Support\Str;

class CategoryRepository implements CategoryInterface
{
    public function getAll()
    {
        return Category::get();
    }
    public function addNew($categoryData)
    {
        $category = new Category;
        $category->name = $categoryData['name'];
        $category->slug = Str::slug($categoryData['name']);
        // $category->created_by = Auth::guard('admin')->user()->id;
        $category->save();
        return $category;
    }
    public function update($categoryData, $id)
    {
        $category = $this->getById($id); 
        $category->name = $categoryData['name'];
        $category->slug = Str::slug($categoryData['name']);
        $category->update();
        return $category;
    }
    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $product = Product::where('category_id', $id)->first();
        if ($product) {
            return false;
        }
        return $category->delete();
    }
    public function getById($id)
    {
        $category = Category::findOrFail($id);
        return $category;
    }
}