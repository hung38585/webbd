@extends('admin.shared.main')
@section('title','Xử lý đơn hàng')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Xử lý đơn hàng</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{route('order.update', $order->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group col-md-12">
                            <label for="">Họ tên: </label>
                            <input type="text" class="form-control mt-2" value="{{ $order->name }}" readonly>
                        </div>
                        <div class="form-group col-md-12 mt-2">
                            <label for="">Số điện thoại: </label>
                            <input type="text" class="form-control mt-2" value="{{ $order->phone }}" readonly>
                        </div>
                        <div class="form-group col-md-12 mt-2">
                            <label for="">Địa chỉ: </label>
                            <input type="text" class="form-control mt-2" value="{{ $order->address }}" readonly>
                        </div>
                        <div class="form-group col-md-12 mt-2">
                            <label for="">Ngày đặt hàng: </label>
                            <input type="text" class="form-control mt-2" value="{{ $order->transaction_date }}" readonly>
                        </div>
                        <div class="form-group col-md-12 mt-2">
                            <label for="">Ghi chú: </label>
                            <input type="text" class="form-control mt-2" value="{{ $order->note }}" readonly>
                        </div>
                        <div class="form-group col-md-12 mt-2">
                            <label for="">Trạng thái: </label>
                            <select name="status" class="form-select" id="status">
                            @for ($i = 1; $i < 5; $i++)
                                <option value="{{$i}}">
                                @switch($i)
                                    @case(1)
                                        Mới
                                        @break

                                    @case(2)
                                        Đang giao
                                        @break

                                    @case(3)
                                        Đã giao
                                        @break    

                                    @default
                                        Đã hủy
                                @endswitch
                                </option>
                            @endfor
                            </select>
                        </div>
                    </div>
                    <div class="col-md-7">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Giá</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($order_details as $key => $order_detail)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $order_detail->product->name }}</td>
                                    <td>{{ $order_detail->quantity }}</td>
                                    <td>{{ number_format($order_detail->price) }} đ</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="form-group col-md-12 mt-2">
                            <label for="">Tổng số tiền: </label>
                            <input type="text" class="form-control mt-2" value="{{ number_format($order->total_amount) }} đ" readonly>
                        </div>
                        <div class="form-group col-md-12 mt-2">
                            <input type="submit" class="btn btn-outline-success" value="Cập nhật">
                            <a href="{{route('order.index')}}" class="btn btn-outline-danger">Hủy bỏ</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    document.getElementById('status').value = {{$order->status}};
</script>
@endsection