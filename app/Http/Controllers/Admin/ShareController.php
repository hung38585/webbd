<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ShareRequest;
use App\Models\Shares;

class ShareController extends Controller
{
    private $shareModel;
    public function __construct()
    {
        $this->shareModel = new Shares();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shares = $this->shareModel->getAll(10);
        return view('admin.handbook.index',compact('shares'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.handbook.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $share = $this->shareModel->create($request->all());
        if ($share){
            return redirect('/admin/share')->with('message','Tạo mới thành công!');
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
        $share = $this->shareModel->getById($id); 
        return view('admin.handbook.edit',compact('share'));
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
        $share = $this->shareModel->edit($request->all(), $id);
        if ($share){
            return redirect('/admin/share')->with('message','Cập nhật thành công!');
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
        $share = $this->shareModel->remove($request->record_id);
        if ($share){
            return redirect('/admin/share')->with('message','Xóa thành công!');
        }else{
            return back()->with('err','Xóa thất bại!');
        }
    }
}
