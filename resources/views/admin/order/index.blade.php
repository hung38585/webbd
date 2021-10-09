@extends('admin.shared.main')
@section('title','Đơn hàng')
@section('content')
<div class="container-fluid px-4">
    <div class="row ml-1 col-md-12 mt-2">
        @if (Session::has('message'))
        <p class="alert alert-success notification">{{ Session::get('message')}}</p>
        @elseif(Session::has('err'))
        <p class="alert alert-danger notification">{{ Session::get('err')}}</p>
        @endif
    </div>
    <h1 class="mt-4">Đơn hàng</h1>
    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên người đặt</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Trạng thái</th>
                        <th>Số tiền</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $key => $order)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->address }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>
                        @switch($order->status)
                            @case(1)
                                <span class="text-success" style="font-weight: bold;text-align: center;">Mới</span>
                                @break

                            @case(2)
                                <span class="text-warning" style="font-weight: bold;text-align: center;">Đang giao</span>
                                @break

                            @case(3)
                                <span class="text-primary" style="font-weight: bold;text-align: center;">Đã giao</span>
                                @break    

                            @default
                                <span class="text-danger" style="font-weight: bold;text-align: center;">Đã hủy</span>
                        @endswitch
                        </td>
                        <td>{{ number_format($order->total_amount) }} đ</td>
                        <td style="width: 90px;">
                            <a href="{{route('order.edit',$order->id)}}" class="ml-1 btn" style="width:40px; padding: 4px"><i class="fa fa-edit "></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- paginate -->
        <div class="col-md-12">
            {{$orders->links('admin.product.paginate')}}
        </div>
    </div>
</div>
<form action="{{route('order.destroy', 1)}}" method="POST">
    @csrf
    @method('DELETE')
    @include('admin.shared.modal_delete')
</form>
@endsection