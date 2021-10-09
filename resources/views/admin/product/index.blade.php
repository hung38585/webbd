@extends('admin.shared.main')
@section('title','Sản phẩm')
@section('content')
<div class="container-fluid px-4">
    <div class="row ml-1 col-md-12 mt-2">
        @if (Session::has('message'))
        <p class="alert alert-success notification">{{ Session::get('message')}}</p>
        @elseif(Session::has('err'))
        <p class="alert alert-danger notification">{{ Session::get('err')}}</p>
        @endif
    </div>
    <h1 class="mt-4">Sản phẩm</h1>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-9">
                    <form method="GET">
                        <div class="col-md-12 row">
                            <div class="col-md-6">
                                <a href="{{route('product.create')}}" class="btn btn-outline-success mb-2 mt-2">Tạo Sản phẩm</a>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="keyword" class="form-control" placeholder="Nhập tên hoặc mã sản phẩm" value="{{ isset($_GET['keyword']) ? $_GET['keyword']: ''  }}" style="float: left; width: 70%;">
                                <input type="submit" class="btn btn-outline-primary" value="Tìm kiếm" style="float: left; width: 28%; margin-left:2%;">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-3">
                </div>
            </div>
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên sản phẩm</th>
                        <th>Mã</th>
                        <th>Giá</th>
                        <th>Hình ảnh</th>
                        <th>Danh mục</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $key => $product)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>
                            {{ $product->name }}
                            @if ($product->color)
                            <br><hr style="margin: 0;">
                            Màu sắc: {{ config('constant.COLOR')[$product->color] }}
                            @endif
                        </td>
                        <td>{{ $product->product_code }}</td>
                        <td>{{ number_format($product->price) }}đ</td>
                        <td>
                            <img src="{{asset('images/' . $product->image[0]->url)}}" alt="" style="width: 100px; height:80px;">
                            <a href="{{url('/admin/list-image/' . $product->id)}}" class="ml-1 btn" style="width:40px; padding: 4px"><i class="fa fa-edit "></i></a>
                        </td>
                        <td>
                            {{ $product->category->name }}
                        </td>
                        <td style="width: 90px;">
                            <a href="{{route('product.edit',$product->id)}}" class="ml-1 btn" style="width:40px; padding: 4px"><i class="fa fa-edit "></i></a>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn delete-modal text-danger" data-id="{{$product->id}}" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="width: 10px; padding: 7px 15px;">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- paginate -->
        <div class="col-md-12">
            {{$products->links('admin.product.paginate')}}
        </div>
    </div>
</div>
<form action="{{route('product.destroy', 1)}}" method="POST">
    @csrf
    @method('DELETE')
    @include('admin.shared.modal_delete')
</form>
@endsection