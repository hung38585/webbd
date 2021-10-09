@extends('client.shared.main')
@section('title', 'Mua hàng')
@section('content')
<div id="fh5co-testimonial" class="fh5co-section-gray">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="/gio-hang">Giỏ hàng</a></li>
                <li class="breadcrumb-item active" aria-current="page">Mua hàng</li>
            </ol>
        </nav>
        <div class="fh5co-contact-info row" style="margin-bottom: 100px;">
            <div class="col-md-2"></div>
            <div class="col-md-8 col-md-offset-2 fh5co-heading animate-box">
                <h2>Mua hàng</h2>
            </div>
            <div class="col-md-12 col-md-offset-0 row">
                <div class="col-md-5">
                    <p style="text-align: center; font-size: 25px;">Giỏ hàng</p>
                    @if (count($carts) > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" colspan="2">Sản phẩm</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Số lượng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total = 0;
                            ?>
                            @foreach($carts as $key => $cart)
                            <tr>
                                <td style="width: 150px;">
                                    <img src="{{asset('images/' . $cart['image'])}}" alt="" style="width: 150px; height: 80px;">
                                </td>
                                <td>
                                    <a href="/san-pham/{{$cart['slug']}}" style="margin-left: 10px;">{{ $cart['name'] }}</a>
                                </td>
                                <td>
                                    @if ($cart['promotion'])
                                        <?php
                                            $total += $cart['promotion'] * $cart['quantity'];
                                        ?>
                                        <span style="font-weight: bold;">{{ number_format($cart['promotion']) }} đ</span>
                                        <br>
                                        <strike>{{ number_format($cart['price']) }} đ</strike>
                                    @else 
                                        <?php
                                            $total += $cart['price'] * $cart['quantity'];
                                        ?>
                                        <span style="font-weight: bold;">{{ number_format($cart['price']) }} đ</span>
                                    @endif
                                </td>
                                <td> {{ $cart['quantity'] }} </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <p>Tổng số tiền: <span style="font-weight: bold;">{{ number_format($total) }} đ</span></p>
                    @else
                    <p style="text-align: center;">Chưa có sản phẩm nào trong giỏ hàng!<br> <a href="/san-pham" class="btn btn-success" style="text-align: center;">Tiếp tục mua hàng</a></p>
                    @endif
                </div>
                <div class="col-md-7">
                    <p style="text-align: center; font-size: 25px;">Thông tin của bạn</p>
                    <form action="/dat-hang" method="POST" onsubmit="return checkform()">
                        @csrf
                        <div class="col-md-12 row">
                            <div class="col-md-6">
                                <label for="">Họ tên:</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Nhập họ tên" required>
                                <span class="text-danger name_err"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="">Số điện thoại:</label>
                                <input type="text" name="phone" id="phone" class="form-control" placeholder="Nhập số điện thoại" required>
                                <span class="text-danger phone_err"></span>
                            </div>
                        </div>
                        <div class="col-md-12 row">
                            <div class="col-md-6">
                                <label for="">Địa chỉ:</label>
                                <input type="text" name="address" id="address" class="form-control" placeholder="Nhập địa chỉ" required>
                                <span class="text-danger address_err"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="">Ghi chú:</label>
                                <input type="text" name="note" id="note" class="form-control" placeholder="Ghi chú">
                                <span class="text-danger note_err"></span>
                            </div>
                        </div>
                        <div class="col-md-12 row">
                            <input type="hidden" name="total_amount" value="{{ $total }}">
                            <input type="submit" class=" btn btn-success" value="Đặt hàng" style="float: right; margin-top: 20px;">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function checkform() {
        var result = true;
        var name = document.getElementById('name').value.trim();
        var phone = document.getElementById('phone').value.trim();
        var address = document.getElementById('address').value.trim();
        var note = document.getElementById('note').value.trim();
        document.querySelector('.name_err').innerText = '';
        document.querySelector('.phone_err').innerText = '';
        document.querySelector('.address_err').innerText = '';
        document.querySelector('.note_err').innerText = '';
        var regex = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
        if (name.length > 255) {
            document.querySelector('.name_err').innerText = 'Độ dài tối đa là 255 ký tự';
            result = false;
        }
        if (phone.length > 255) {
            document.querySelector('.phone_err').innerText = 'Độ dài tối đa là 255 ký tự';
            result = false;
        }
        if(!phone.match(regex)) {
            document.querySelector('.phone_err').innerText = 'Xin vui lòng nhập đúng định dạng số điện thoại';
            result = false;
        }
        if (address.length > 255) {
            document.querySelector('.address_err').innerText = 'Độ dài tối đa là 255 ký tự';
            result = false;
        }
        if (note.length > 255) {
            document.querySelector('.note_err').innerText = 'Độ dài tối đa là 255 ký tự';
            result = false;
        }
        return result;
    }
</script>
@endsection