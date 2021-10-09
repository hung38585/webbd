<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\CategoryInterface;
use App\Repositories\Interfaces\ProductInterface;
use App\Repositories\Interfaces\InfomationInterface;

class ProductController extends Controller
{
    private $categoryRepo;
    private $productRepo;
    private $infomationRepo;
    public function __construct(CategoryInterface $categoryRepository, ProductInterface $ProductRepository, InfomationInterface $infomationRepository)
    {
        $this->categoryRepo = $categoryRepository;
        $this->productRepo = $ProductRepository;
        $this->infomationRepo = $infomationRepository;
        $infomation = $this->infomationRepo->getAll();
        view()->share(compact('infomation'));
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
        $products = $this->productRepo->getAll($keyword, 12, 'client', $request->all());
        return view('client/product/index', compact('categories', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $slug)
    {
        $productId = $this->productRepo->getIdBySlug($slug, ''); 
        $product = $this->productRepo->getById($productId); 
        $categories = $this->categoryRepo->getAll();
        $images = $this->productRepo->getListImageById($product->id);
        $productRelates = $this->productRepo->getProductByCategory($product->category_id);
        return view('client/product/detail', compact('product', 'categories', 'images', 'productRelates'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
