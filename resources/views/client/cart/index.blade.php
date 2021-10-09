@extends('client.shared.main')
@section('title','Giỏ hàng')
@section('content')
<div id="fh5co-couple-story" class="fh5co-section-gray">
    <div class="container" style="margin-bottom: 30px;">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
                <h2>Giỏ hàng</h2>
            </div>
        </div>
        @if(session('false'))
            <div class="alert alert-danger text-center notification" >
                {{ session('false') }}
            </div>
        @endif
        @if(session('order_success'))
        <div class="alert alert-success text-center notification" >
            {{ session('order_success') }}
        </div>
        @endif
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                @if (isset($carts) && count($carts) > 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Sản phẩm</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($carts as $key => $cart)
                        <tr>
                            <td style="width: 200px;">
                                <img src="{{asset('images/' . $cart['image'])}}" alt="" style="width: 200px; height: 120px;">
                            </td>
                            <td>
                                <a href="/san-pham/{{$cart['slug']}}" style="margin-left: 10px;">{{ $cart['name'] }}</a>
                            </td>
                            <td>
                                @if ($cart['promotion'])
                                    <span style="font-weight: bold;">{{ number_format($cart['promotion']) }} đ</span>
                                    <br>
                                    <strike>{{ number_format($cart['price']) }} đ</strike>
                                @else 
                                <span style="font-weight: bold;">{{ number_format($cart['price']) }} đ</span>
                                @endif
                            </td>
                            <td>
                                <input type="number" class="product_quantity_{{$cart['id']}}" min="1" max="100" value="{{$cart['quantity']}}" style="width: 45px;">
                            </td>
                            <td>
                                <button type="button" class="btn delete-modal text-danger" value="{{$cart['id']}}" onclick="deleteProduct('{{$cart['id']}}')">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                                <button type="submit" class="btn delete-modal text-success" onclick="updateProduct('{{$cart['id']}}')">
                                    <i class="fas fa-check-square"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <p style="text-align: center;">Chưa có sản phẩm nào trong giỏ hàng!<br> <a href="/san-pham" class="btn btn-success" style="text-align: center;">Tiếp tục mua hàng</a></p>
                @endif
            </div>
            <form action="/mua-hang" method="POST">
                @csrf
                <input type="submit" class="btn btn-success" value="Mua hàng" style="float: right; margin-bottom: 10px;">
            </form>
        </div>
    </div>
    <form action="{{route('gio-hang.destroy', 1)}}" method="POST" id="form_delete">
        @csrf
        @method('DELETE')
        <input type="hidden" value="" id="product_delete" name="product_delete">
    </form>
    <form action="{{route('gio-hang.update', 1)}}" method="POST" id="form_update">
        @csrf
        @method('PUT')
        <input type="hidden" value="" id="product_update" name="product_update">
        <input type="hidden" value="" id="product_quantity" name="product_quantity">
    </form>
</div>
<script>
    function deleteProduct(id) {
        document.getElementById('product_delete').value = id;
        document.getElementById('form_delete').submit();
    }
    function updateProduct(id) {
        document.getElementById('product_update').value = id;
        document.getElementById('product_quantity').value = document.querySelector('.product_quantity_' + id).value;
        document.getElementById('form_update').submit();
    }
</script>
@endsection