@extends('admin.shared.main')
@section('title','Tạo trang phục')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Tạo trang phục</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="row col-md-6">
                        <div class="form-group col-md-12">
                            <label for="name">Tên trang phục: </label>
                            <input type="text" id="name" class="form-control mt-1" name="name" placeholder="Nhập tên danh mục">
                            <span class="text-danger">{{ $errors->first('name')}}</span>
                        </div>
                        <div class="form-group col-md-12 mt-2">
                            <label for="price">Giá: </label>
                            <input type="text" id="price" class="form-control mt-1" name="price" placeholder="Nhập giá">
                            <span class="text-danger">{{ $errors->first('price')}}</span>
                        </div>
                        <div class="form-group col-md-12 mt-2">
                            <label for="status">Danh mục: </label>
                            <select class="form-select mt-1" name="category_id" id="category_id">
                                <?php $cateID = []; ?>
                                @foreach($categories as $key => $category)
                                <?php 
                                    if ($category->type_name == 'ao-dai') {
                                        $cateID[] = $category->id;
                                    }
                                ?>
                                <option value="{{ $category->id }}" data-name="{{ $category->type_name }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('category_id')}}</span>
                        </div>
                        <div class="form-group col-md-12 mt-2">
                            <label for="price">Mã trang phục: </label>
                            <input type="text" id="product_code" class="form-control mt-1" name="product_code" placeholder="Nhập mã trang phục">
                            <span class="text-danger">{{ $errors->first('product_code')}}</span>
                        </div>
                        <div class="form-group col-md-12 mt-2">
                            <label for="promotion">Giá khuyến mãi: </label>
                            <input type="text" id="promotion" class="form-control mt-1" name="promotion" placeholder="Nhập giá khuyến mãi">
                            <span class="text-danger">{{ $errors->first('promotion')}}</span>
                        </div>
                        <div class="form-group col-md-12 mt-2">
                            <label for="isdisplay">Hiển thị: </label>
                            <select class="form-select mt-1" name="isdisplay">
                                <option selected value="1">Ẩn</option>
                                <option value="2">Hiển thị</option>
                            </select>
                            <span class="text-danger">{{ $errors->first('isdisplay')}}</span>
                        </div>
                        <div class="form-group col-md-12 mt-2">
                            <label for="image" class="form-label">Danh sách hình ảnh</label>
                            <input class="form-control" type="file" id="image" name="image[]" multiple>
                            <span class="text-danger">{{ $errors->first('image')}}</span>
                            <span class="text-danger">{{ $errors->first('image.0')}}</span>
                        </div>
                    </div>
                    <div class="row col-md-6">
                        <div class="form-group col-md-12">
                            <label for="description">Mô tả: </label>
                            <textarea class="form-control mt-1 ckeditor" name="description" placeholder="Nhập mô tả" id="editor1"></textarea>
                            <span class="text-danger">{{ $errors->first('description')}}</span>
                        </div>
                        <div class="form-group col-md-12 mt-2">
                            <input type="submit" class="btn btn-outline-success mt-4" value="Tạo trang phục">
                            <a href="{{route('product.index')}}" class="btn btn-outline-danger mt-4">Hủy bỏ</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection