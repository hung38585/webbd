<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\CategoryInterface;
use App\Repositories\Interfaces\ProductInterface;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    private $categoryRepo;
    private $productRepo;
    public function __construct(CategoryInterface $categoryRepository, ProductInterface $ProductRepository)
    {
        $this->categoryRepo = $categoryRepository;
        $this->productRepo = $ProductRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = '';
        if (!empty($request->keyword)) {
            $keyword = $request->keyword;
        }
        $categories = $this->categoryRepo->getAll();
        $products = $this->productRepo->getAll($keyword, 10, 'admin', '');
        return view('admin.product.index', compact('categories', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoryRepo->getAll();
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product = $this->productRepo->addNew($request->all());
        if ($product){
            return redirect('/admin/product')->with('message','Tạo mới thành công!');
        }else{
            return back()->with('err','Tạo mới thất bại!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->productRepo->getById($id); 
        $categories = $this->categoryRepo->getAll();
        $images = $this->productRepo->getListImageById($product->id);
        return view('admin.product.edit',compact('product', 'categories', 'images'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $product = $this->productRepo->update($request->all(), $id);
        if ($product){
            return redirect('/admin/product')->with('message','Cập nhật thành công!');
        }else{
            return back()->with('err','Cập nhật thất bại!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $product = $this->productRepo->delete($request->record_id);
        if ($product){
            return redirect('/admin/product')->with('message','Xóa thành công!');
        }else{
            return back()->with('err','Xóa thất bại!');
        }
    }
    public function listImage($id)
    {
        $images = $this->productRepo->getListImageById($id);
        return view('admin.product.listImage', compact('images'));
    }
}
