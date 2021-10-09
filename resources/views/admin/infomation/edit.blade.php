@extends('admin.shared.main')
@section('title','Chỉnh sửa thông tin')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Chỉnh sửa thông tin trang web</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{route('infomation.update', $infomation->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group col-md-12">
                            <label for="name">Tên tiệm: </label>
                            <input type="text" id="name" class="form-control mt-2" name="name" placeholder="Nhập tên tiệm" value="{{ $infomation->name }}">
                            <span class="text-danger">{{ $errors->first('name')}}</span>
                        </div>
                        <div class="form-group col-md-12 mt-2">
                            <label for="facebook">Facebook: </label>
                            <input type="text" id="facebook" class="form-control mt-2" name="facebook" placeholder="Nhập mô tả" value="{{ $infomation->facebook }}">
                            <span class="text-danger">{{ $errors->first('facebook')}}</span>
                        </div>
                        <div class="form-group col-md-12 mt-2">
                            <label for="address">Địa chỉ: </label>
                            <input type="text" id="address" class="form-control mt-2" name="address" placeholder="Nhập mô tả" value="{{ $infomation->address }}">
                            <span class="text-danger">{{ $errors->first('address')}}</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group col-md-12">
                            <label for="name">Số điện thoại: </label>
                            <input type="text" id="phone" class="form-control mt-2" name="phone" placeholder="Nhập tên tiệm" value="{{ $infomation->phone }}">
                            <span class="text-danger">{{ $errors->first('phone')}}</span>
                        </div>
                        <div class="form-group col-md-12 mt-2">
                            <label for="mail">Email: </label>
                            <input type="text" id="mail" class="form-control mt-2" name="mail" placeholder="Nhập mô tả" value="{{ $infomation->mail }}">
                            <span class="text-danger">{{ $errors->first('mail')}}</span>
                        </div>
                        <!-- <div class="form-group col-md-12 form-group col-md-12 mt-2">
                            <label for="video" class="form-label">Video:</label>
                            <input class="form-control" type="file" id="video" name="video">
                            <span class="text-danger">{{ $errors->first('video')}}</span>
                        </div> -->
                    </div>
                    <div class="form-group col-md-12 mt-2">
                        <input type="submit" class="btn btn-outline-success" value="Cập nhật">
                        <a href="{{route('infomation.index')}}" class="btn btn-outline-danger">Hủy bỏ</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection