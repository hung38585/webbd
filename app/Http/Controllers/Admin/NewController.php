<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\NewRequest;
use App\Models\News;

class NewController extends Controller
{
    private $newModel;
    public function __construct()
    {
        $this->newModel = new News();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = $this->newModel->getAll(10);
        return view('admin.new.index',compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.new.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewRequest $request)
    {
        $new = $this->newModel->create($request->all());
        if ($new){
            return redirect('/admin/new')->with('message','Tạo mới thành công!');
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
        $new = $this->newModel->getById($id); 
        return view('admin.new.edit',compact('new'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewRequest $request, $id)
    {
        $new = $this->newModel->edit($request->all(), $id);
        if ($new){
            return redirect('/admin/new')->with('message','Cập nhật thành công!');
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
    public function destroy(Request $request)
    {
        $new = $this->newModel->remove($request->record_id);
        if ($new){
            return redirect('/admin/new')->with('message','Xóa thành công!');
        }else{
            return back()->with('err','Xóa thất bại!');
        }
    }
}
