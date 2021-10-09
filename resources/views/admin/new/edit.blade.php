@extends('admin.shared.main')
@section('title','Chỉnh sửa tin tức')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Chỉnh sửa tin tức</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{route('new.update', $new->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group col-md-12">
                            <label for="title">Tiêu đề: </label>
                            <input type="hidden" name="id" value="{{ $new->id }}">
                            <input type="text" id="title" class="form-control mt-2" name="title" placeholder="Nhập tiêu đề" value="{{ $new->title }}">
                            <span class="text-danger">{{ $errors->first('title')}}</span>
                        </div>
                        <div class="form-group col-md-12 mt-2">
                            <label for="image" class="form-label">Hình ảnh:</label>
                            <input class="form-control" type="file" id="image" name="image">
                            <span class="text-danger">{{ $errors->first('image')}}</span>
                            <img class="mt-2" src="{{asset('images/' . $new->image)}}" alt="" style="width: 100%;">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group col-md-12">
                            <label for="content">Nội dung: </label>
                            <textarea class="form-control mt-1 ckeditor" name="content" placeholder="Nhập nội dung" id="editor1">{{ $new->content }}</textarea>
                            <span class="text-danger">{{ $errors->first('content')}}</span>
                        </div>
                        <div class="form-group col-md-12 mt-2">
                            <input type="submit" class="btn btn-outline-success" value="Cập nhật">
                            <a href="{{route('new.index')}}" class="btn btn-outline-danger">Hủy bỏ</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection