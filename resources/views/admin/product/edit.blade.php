@extends('admin.shared.main')
@section('title','Chỉnh sửa trang phục')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Chỉnh sửa trang phục</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{route('product.update', $product->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <input type="hidden" value="{{ $product->id }}" name="id">
                    <div class="row col-md-6">
                        <div class="form-group col-md-12">
                            <label for="name">Tên trang phục: </label>
                            <input type="text" id="name" class="form-control mt-1" name="name" placeholder="Nhập tên danh mục" value="{{ $product->name }}">
                            <span class="text-danger">{{ $errors->first('name')}}</span>
                        </div>
                        <div class="form-group col-md-12 mt-2">
                            <label for="price">Giá: </label>
                            <input type="text" id="price" class="form-control mt-1" name="price" placeholder="Nhập giá" value="{{ $product->price }}">
                            <span class="text-danger">{{ $errors->first('price')}}</span>
                        </div>
                        <div class="form-group col-md-12 mt-2">
                            <label for="promotion">Giá khuyến mãi: </label>
                            <input type="text" id="promotion" class="form-control mt-1" name="promotion" placeholder="Nhập giá khuyến mãi" value="{{ $product->promotion }}">
                            <span class="text-danger">{{ $errors->first('promotion')}}</span>
                        </div>
                        <div class="form-group col-md-12 mt-2">
                            <label for="status">Danh mục: </label>
                            <select class="form-select mt-1" name="category_id" onchange="onchangeCategory(this)">
                                <?php $cateID = []; ?>
                                @foreach($categories as $key => $category)
                                <option {{ $product->category_id == $category->id ? 'selected': '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('category_id')}}</span>
                        </div>
                        <div class="form-group col-md-12 mt-2">
                            <label for="isdisplay">Hiển thị: </label>
                            <select class="form-select mt-1" name="isdisplay">
                                <option {{ $product->isdisplay == 1 ? 'selected': '' }} value="1">Ẩn</option>
                                <option {{ $product->isdisplay == 2 ? 'selected': '' }} value="2">Hiển thị</option>
                            </select>
                            <span class="text-danger">{{ $errors->first('isdisplay')}}</span>
                        </div>
                        <div class="form-group col-md-12 mt-2">
                            <label for="price">Mã trang phục: </label>
                            <input type="text" id="product_code" class="form-control mt-1" name="product_code" placeholder="Nhập mã trang phục" value="{{ $product->product_code }}">
                            <span class="text-danger">{{ $errors->first('product_code')}}</span>
                        </div>
                    </div>
                    <div class="row col-md-6">
                        <div class="form-group col-md-12">
                            <label for="description">Mô tả: </label>
                            <textarea class="form-control mt-1 ckeditor" name="description" placeholder="Nhập mô tả" id="editor1">{{ $product->description }}</textarea>
                            <span class="text-danger">{{ $errors->first('description')}}</span>
                        </div>
                        <div class="form-group col-md-12 mt-4">
                            <input type="submit" class="btn btn-outline-success" value="Cập nhật">
                            <a href="{{route('product.index')}}" class="btn btn-outline-danger ">Hủy bỏ</a>
                            <span class="text-danger">{{ $errors->first('status')}}</span>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection