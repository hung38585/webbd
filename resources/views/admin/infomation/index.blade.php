@extends('admin.shared.main')
@section('title','Thông tin trang web')
@section('content')
<div class="container-fluid px-4">
    <div class="row ml-1 col-md-12 mt-2">
        @if (Session::has('message'))
        <p class="alert alert-success notification">{{ Session::get('message')}}</p>
        @elseif(Session::has('err'))
        <p class="alert alert-danger notification">{{ Session::get('err')}}</p>
        @endif
    </div>
    <h1 class="mt-4">Thông tin trang web</h1>
    <div class="card">
        <div class="card-body">
            <div class="col-md-12">
            <a href="{{route('infomation.edit',$infomation->id)}}" class="ml-1 btn btn-success">Chỉnh sửa</a>
            </div>
            <div class="row">
                <div class="row col-md-6">
                    <label for="colFormLabelLg" class="col-sm-4 col-form-label">Tên:</label>
                    <div class="col-sm-6">
                        <p class="mt-2">{{ $infomation->name }}</p>
                    </div>
                    <label for="colFormLabelLg" class="col-sm-4 col-form-label">Số điện thoại:</label>
                    <div class="col-sm-6">
                        <p class="mt-2">{{ $infomation->phone }}</p>
                    </div>
                    <label for="colFormLabelLg" class="col-sm-4 col-form-label">Email:</label>
                    <div class="col-sm-6">
                        <p class="mt-2">{{ $infomation->mail }}</p>
                    </div>
                    <label for="colFormLabelLg" class="col-sm-4 col-form-label">Facebook:</label>
                    <div class="col-sm-6">
                        <p class="mt-2">{{ $infomation->facebook }}</p>
                    </div>
                    <label for="colFormLabelLg" class="col-sm-4 col-form-label">Địa chỉ:</label>
                    <div class="col-sm-6">
                        <p class="mt-2">{{ $infomation->address }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <video playsinline autoplay muted loop id="myVideo" style="width: 100%;">
                        <source src="{{asset('videos/' . $infomation->video)}}" type="video/mp4" >
                    </video>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection