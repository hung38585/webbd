<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\ProductInterface;
use App\Http\Requests\ImageRequest;

class ImageController extends Controller
{
    private $productRepo;
    public function __construct(ProductInterface $ProductRepository)
    {
        $this->productRepo = $ProductRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(ImageRequest $request)
    {
        $image = $this->productRepo->addImage($request->image, $request->product_id);
        if ($image){
            return back()->with('message','Tạo mới thành công!');
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
        $image = $this->productRepo->getImage($id);
        return view('admin.product.editImage',compact('image'));
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
        $request->validate(
            [
                'image' => 'required|image',
            ],
            [
                'required' => 'Hãy chọn file ảnh',
                'image' => 'Hãy chọn file ảnh'
            ]
        );
        $image = $this->productRepo->updateImage($request->image, $id);
        if ($image){
            return back()->with('message','Cập nhật hình ảnh thành công!');
        }else{
            return back()->with('err','Cập nhật hình ảnh thất bại!');
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
        $image = $this->productRepo->deleteImage($request->record_id);
        if ($image){
            return back()->with('message','Xóa thành công!');
        }else{
            return back()->with('err','Xóa thất bại!');
        }
    }
}
