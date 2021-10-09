@extends('admin.shared.main')
@section('title','Tạo feedback')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Tạo feedback</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{route('feedback.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group col-md-12">
                            <label for="name">Tên cô dâu: </label>
                            <input type="text" id="name" class="form-control mt-2" name="name" placeholder="Nhập tên cô dâu">
                            <span class="text-danger">{{ $errors->first('name')}}</span>
                        </div>
                        <div class="form-group col-md-12 mt-2">
                            <label for="image" class="form-label">Hình ảnh:</label>
                            <input class="form-control" type="file" id="image" name="image">
                            <span class="text-danger">{{ $errors->first('image')}}</span>
                        </div>
                        <div class="form-group col-md-12 mt-2">
                            <label for="description">Nội dung: </label>
                            <textarea class="form-control mt-1 ckeditor" name="description" placeholder="Nhập nội dung" id="description"></textarea>
                            <span class="text-danger">{{ $errors->first('description')}}</span>
                        </div>
                    </div>
                    <div class="form-group col-md-12 mt-2">
                        <input type="submit" class="btn btn-outline-success" value="Tạo feedback">
                        <a href="{{route('feedback.index')}}" class="btn btn-outline-danger">Hủy bỏ</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection