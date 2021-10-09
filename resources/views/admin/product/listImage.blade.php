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
    <div class="card">
        <div class="card-body">
            <form action="{{route('image.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12 row">
                    <div class="card col-md-12">
                        <div class="card-header">
                            <h5>Sản phẩm</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Tên sản phẩm: {{$images[0]->product->name}}</li>
                            <li class="list-group-item">Mã sản phẩm: {{$images[0]->product->product_code}}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-12 row mt-5">
                    <h5>Thêm hình ảnh</h5>
                    <div class="col-md-6">
                        <input class="form-control col-md-6" type="file" id="image" name="image[]" multiple>
                        <span class="text-danger">{{ $errors->first('image.0')}}</span>
                        <input type="hidden" name="product_id" value="{{$images[0]->product_id}}">
                    </div>
                    <div class="col-md-6">
                        <input type="submit" class="col-md-2 btn btn-outline-success" value="Thêm">
                    </div>
                </div>
                <div class="form-group col-md-12 mt-5 row">
                    <h5>Danh sách hình ảnh</h5>
                    @foreach ($images as $key => $image)
                    <div class="col-md-4 mt-2">
                        <div class="col-md-12">
                            <img class="admin-image-item" src="{{asset('images/' . $image->url)}}" alt="">
                        </div>
                        <div class="col-md-12 mt-2">
                            <a href="{{route('image.edit',$image->id)}}" class="btn btn-outline-success"><i class="fa fa-edit "></i></a>
                            <!-- Button trigger modal -->
                            @if (count($images) > 1)
                            <button type="button" class="btn delete-modal btn-outline-danger" data-id="{{$image->id}}" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </form>
        </div>
    </div>
</div>
<form action="{{route('image.destroy', 1)}}" method="POST">
    @csrf
    @method('DELETE')
    @include('admin.shared.modal_delete')
</form>
@endsection