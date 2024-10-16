@extends('layout')
@section('title','Theo dõi đơn hàng')
@section('content')
	<!-- ================ start banner area ================= -->	
	<section class="blog-banner-area" id="category">
		<div class="container h-100">
			<div class="blog-banner">
				<div class="text-center">
					<h1>Order Tracking</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Order Tracking</li>
            </ol>
          </nav>
				</div>
			</div>
    </div>
	</section>
	<!-- ================ end banner area ================= -->
  
  
  <!--================Tracking Box Area =================-->
  <section class="tracking_box_area section-margin--small">
  <div class="container">
    <h2 class="mb-4">Theo dõi đơn hàng của bạn</h2>

    @if($orders->isEmpty())
        <p>Hiện tại bạn chưa có đơn hàng nào.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Mã Đơn Hàng</th>
                    <th>Ngày Đặt</th>
                    <th>thanh toán</th>
                    <th>Trạng Thái giao hàng</th>
                    <th>Tổng Tiền</th>
                    <th>Chi Tiết</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>#{{ $order->id }}</td>
                        <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y H:i') }}</td>
                        <td>
                            <span class=" {{ $order->trangthaithanhtoan == 2 ? 'text-success' : 'text-danger' }}">
                                {{ $order->trangthaithanhtoan == 2 ? 'Đã thanh toán' : 'Chưa thanh toán' }}
                            </span>
                        </td>
                        <td>
                        <span class=" {{ $order->trangthai == 4 ? 'text-success' : 'text-danger' }}">
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
                            </span>
                        </td>
                        <td>{{ number_format($order->total_money, 0, ',', '.') }} VNĐ</td>
                        <td>
                        <a href="{{ route('ordersDetails', $order->id) }}" class="btn btn-info">Xem chi tiết</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
  </section>
  <!--================End Tracking Box Area =================-->

@endsection