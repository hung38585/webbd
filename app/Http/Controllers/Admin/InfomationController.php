<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\InfomationInterface;
use App\Http\Requests\InfomationRequest;

class InfomationController extends Controller
{
    private $infomationRepo;
    public function __construct(InfomationInterface $infomationRepository)
    {
        $this->infomationRepo = $infomationRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infomation = $this->infomationRepo->getAll();
        return view('admin.infomation.index',compact('infomation'));
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
        $infomation = $this->infomationRepo->getById($id); 
        return view('admin.infomation.edit',compact('infomation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InfomationRequest $request, $id)
    {
        $infomation = $this->infomationRepo->update($request->all(), $id);
        if ($infomation){
            return redirect('/admin/infomation')->with('message','Cập nhật thành công!');
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
    public function destroy($id)
    {
        //
    }
}
