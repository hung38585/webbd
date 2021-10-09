@extends('admin.shared.main')
@section('title','Tạo danh mục')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Tạo danh mục</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{route('category.store')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="name">Tên danh mục: </label>
                        <input type="text" id="name" class="form-control mt-2" name="name" placeholder="Nhập tên danh mục">
                        <span class="text-danger">{{ $errors->first('name')}}</span>
                    </div>
                    <div class="form-group col-md-12 mt-2">
                        <input type="submit" class="btn btn-outline-success" value="Tạo danh mục">
                        <a href="{{route('category.index')}}" class="btn btn-outline-danger">Hủy bỏ</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection