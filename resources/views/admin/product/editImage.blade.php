@extends('admin.shared.main')
@section('title','Chỉnh sửa hình ảnh')
@section('content')
<div class="container-fluid px-4">
    <div class="row ml-1 col-md-12 mt-2">
        @if (Session::has('message'))
        <p class="alert alert-success notification">{{ Session::get('message')}}</p>
        @elseif(Session::has('err'))
        <p class="alert alert-danger notification">{{ Session::get('err')}}</p>
        @endif
    </div>
    <h1 class="mt-4">Chỉnh sửa hình ảnh</h1>
    <div class="card col-md-12">
        <div class="card-header">
            <h5>Sản phẩm</h5>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Tên Sản phẩm: {{$image->product->name}}</li>
            <li class="list-group-item">Mã Sản phẩm: {{$image->product->product_code}}</li>
        </ul>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{route('image.update', $image->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-md-12 row mt-2">
                    <h5>Thay đổi hình ảnh</h5>
                    <div class="col-md-6">
                        <input class="form-control col-md-6" type="file" id="image" name="image">
                        <span class="text-danger">{{ $errors->first('image')}}</span>
                        <span class="text-danger">{{ $errors->first('image.0')}}</span>
                    </div>
                    <div class="col-md-6">
                        <input type="submit" class="btn btn-outline-success" value="Lưu">
                    </div>
                    <h5 class="mt-2">Hình ảnh</h5>
                    <div class="col-md-12 mt-2">
                        <img src="{{asset('images/' . $image->url)}}" alt="">
                    </div>
                </div>
        </div>
        </form>
    </div>
</div>
@endsection