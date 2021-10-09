<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\AboutInterface;
use App\Http\Requests\AboutRequest;

class AboutController extends Controller
{
    private $aboutRepo;
    public function __construct(AboutInterface $aboutRepository)
    {
        $this->aboutRepo = $aboutRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts = $this->aboutRepo->getAll();
        return view('admin.about.index',compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.about.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AboutRequest $request)
    {
        $about = $this->aboutRepo->addNew($request->all());
        if ($about){
            return redirect('/admin/about')->with('message','Tạo mới thành công!');
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
        $about = $this->aboutRepo->getById($id); 
        return view('admin.about.edit',compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AboutRequest $request, $id)
    {
        $about = $this->aboutRepo->update($request->all(), $id);
        if ($about){
            return redirect('/admin/about')->with('message','Cập nhật thành công!');
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
        $about = $this->aboutRepo->delete($request->record_id);
        if ($about){
            return redirect('/admin/about')->with('message','Xóa thành công!');
        }else{
            return back()->with('err','Xóa thất bại!');
        }
    }
}
