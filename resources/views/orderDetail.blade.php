@extends('layout')
@section('title','Theo dõi đơn hàng')


@section('content')
<div class="container my-4">
    <h2>Chi tiết đơn hàng #{{ $order->id }}</h2>
    <p><strong>Ngày Đặt:</strong> {{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y H:i') }}</p>


    <p><strong>Trạng Thái thanh toán:</strong>
        <span class=" {{ $order->trangthaithanhtoan ==2 ? 'text-success' : 'text-danger' }}">
            {{ $order->trangthaithanhtoan ==2 ? 'Đã thanh toán' : 'Chưa thanh toán' }}
        </span>
    </p>
    <p><strong>Vận chuyển</strong>: <span class=" {{ $order->trangthai == 4 ? 'text-success' : 'text-danger' }}">
            @if ($order->trangthai==1)
            Đang chờ duyệt
            @elseif($order->trangthai==2)
            Đang chuẩn bị
            @elseif($order->trangthai==3)
            xuất hàng
            @elseif($order->trangthai==4)
            Giao hàng thành công
            @else
            Đơn hàng đã bị hủy
            @endif
        </span></p>
    <p><strong>Tổng Tiền:</strong> {{ number_format($order->total_money, 0, ',', '.') }} VNĐ</p>

    <h4>Chi tiết sản phẩm:</h4>
    <table class="table">
        <thead>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>@if($order->trangthai == 4 || $order->trangthai == 5)
                <button type="submit" class="btn btn-danger" disabled>Hủy đơn hàng</button>
                    @else
                    <form action="{{ route('ordersCancel', $order->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn hủy đơn hàng này không?')">
                        @csrf
                        <button type="submit" class="btn btn-danger">Hủy đơn hàng</button>
                    </form>
                    @endif
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($orderDetails as $detail)
            <tr>
                <td>{{ $detail->product->name }}</td>
                <td><img src="{{ asset('img/product/' . $detail->product->img) }}" style="width: 140px ;height:auto;" class="avatar avatar-md me-4" alt="user1"></td>
                <td>{{ $detail->quantity }}</td>
                <td>{{ number_format($detail->price, 0, ',', '.') }} VNĐ</td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection