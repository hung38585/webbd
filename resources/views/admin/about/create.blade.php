@extends('admin.shared.main')
@section('title','Tạo mục giới thiệu')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Tạo mục giới thiệu</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{route('about.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-7">
                        <div class="form-group col-md-12">
                            <label for="content">Nội dung: </label>
                            <textarea class="form-control mt-1 ckeditor" name="content" placeholder="Nhập nội dung" id="editor1"></textarea>
                            <span class="text-danger">{{ $errors->first('content')}}</span>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group col-md-12">
                            <label for="image" class="form-label">Hình ảnh:</label>
                            <input class="form-control" type="file" id="image" name="image">
                            <span class="text-danger">{{ $errors->first('image')}}</span>
                        </div>
                    </div>
                    <div class="form-group col-md-12 mt-2">
                        <input type="submit" class="btn btn-outline-success" value="Tạo mục giới thiệu">
                        <a href="{{route('about.index')}}" class="btn btn-outline-danger">Hủy bỏ</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection