@extends('admin.layoutAdmin')
@section('content')
<style>
  .card-header {
    font-weight: bold;
    font-size: 1.1rem;
  }

  .btn-outline-primary {
    font-size: 0.9rem;
  }

  .table th,
  .table td {
    vertical-align: middle;
  }
</style>
<div class="container">
  <div class="row">
    <!-- Thông tin đơn hàng -->
    <div class="col-md-4">
  <div class="card mb-3">
    <div class="card-header bg-success text-white">
      Thông tin đơn hàng
    </div>
    <div class="card-body">
      <form action="{{ route('order.updateStatus', $order->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <p>Mã: 
          <span class="text-info">#{{$order->id}}</span>
          <input type="hidden" name="order_id" class="form-control" value="{{$order->id}}" />
        </p>
        
        <p>Ngày tạo: 20/11/2020 08:11</p>
        
        <p>Trạng thái đơn hàng: 
          <select name="trangthai" class="form-control">
            <option value=1 {{ $order->trangthai == 1 ? 'selected' : '' }}>Đang xử lý</option>
            <option value=2 {{ $order->trangthai == 2 ? 'selected' : '' }}>Đang chuẩn bị</option>
            <option value=3 {{ $order->trangthai == 3 ? 'selected' : '' }}>xuất hàng</option>
            <option value=4 {{ $order->trangthai == 4 ? 'selected' : '' }}>giao hàng thành công</option>
            <option value=5 {{ $order->trangthai == 5 ? 'selected' : '' }}>hủy đơn</option>
          </select>
        </p>

        <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
      </form>
    </div>
  </div>
</div>


    <!-- Thanh toán -->
    <div class="col-md-4">
      <div class="card mb-3">
        <div class="card-header bg-success text-white">
          Thanh toán
        </div>
        <div class="card-body">
          <p>Thanh toán khi nhận hàng</p>
          <p>Trạng thái thanh toán: <span class="{{$order->trangthaithanhtoan==1?'text-danger':'text-success'}}">{{$order->trangthaithanhtoan==1?'Chưa thanh toán':'Đã thanh toán'}}</span></p>
        </div>
        <!-- Nút để thay đổi trạng thái thanh toán -->
<form action="{{ route('order.updatePaymentStatus', $order->id) }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-primary ms-3">Đổi trạng thái thanh toán</button>
</form>
      </div>
    </div>

    <!-- Giao hàng -->
    <div class="col-md-4">
      <div class="card mb-3">
        <div class="card-header bg-success text-white">
          Giao hàng
        </div>
        <div class="card-body">
          <p>Hình thức lấy hàng: Giao hàng tận nơi</p>
          <p>Trạng thái giao hàng: <span class="text-danger">Chưa giao hàng</span></p>
        </div>
      </div>
    </div>
  </div>

  <!-- Chi tiết đơn hàng -->
  <div class="card mb-3">
    <div class="card-header bg-success text-white">
      Chi tiết đơn hàng
    </div>
    <div class="card-body">
      <table class="table">
        <thead>
          <tr>
            <th>Ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Đơn giá</th>
            <th>Thành tiền</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($donhang as $item)
          <tr>
            <td>  <img src="{{ asset('img/product/' . $item->product->img) }}" style="width: 140px ;height:auto;" class="avatar avatar-md me-4" alt="user1"></td>
            <td>{{$item->product->name}}</td>
            <td>{{$item->quantity}}</td>
            <td>{{number_format($item->price)}}đ</td>
            <td>{{number_format($item->quantity*$item->price)}}đ</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <!-- Kho xuất hàng và Địa chỉ lấy hàng -->
  <div class="row">
    <div class="col-md-6">
      <div class="card mb-3">
        <div class="card-header bg-success text-white">
          Kho xuất hàng
        </div>
        <div class="card-body">
          <select class="form-select">
            <option>Hồ Chí Minh - Tân Bình 01</option>
          </select>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card mb-3">
        <div class="card-header bg-success text-white">
          Địa chỉ lấy hàng
        </div>
        <div class="card-body">
          <p>196 Nguyễn Đình Chiểu, Phường 6, Quận 3, Hồ Chí Minh</p>
          <button class="btn btn-outline-primary btn-sm">Chỉnh sửa</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Thông tin giao hàng và ghi chú -->
  <div class="row">
    <div class="col-md-6">
      <div class="card mb-3">
        <div class="card-header bg-success text-white">
          Thông tin giao hàng
        </div>
        <div class="card-body">
          <p>{{$order->user_address}}</p>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card mb-3">
        <div class="card-header bg-success text-white">
          Ghi chú đơn hàng
        </div>
        <div class="card-body">
          <textarea class="form-control" rows="2"></textarea>
          <button class="btn btn-outline-primary btn-sm mt-2">Cập nhật</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Tổng tiền và nút xác nhận -->
  <div class="card mb-3">
    <div class="card-body">
      <p>Tổng tiền: <strong>{{number_format($order->total_money)}}₫</strong></p>
      <button class="btn btn-success" id="confirmPayment">Xác nhận thanh toán</button>
      <button class="btn btn-primary">Tạo phiếu vận chuyển</button>
      <a href="{{ route('admin.orders.print', $order->id) }}" class="btn btn-primary" target="_blank">In Hóa Đơn</a>

    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  document.getElementById('confirmPayment').addEventListener('click', function() {
    let orderId = {{ $order->id }} ; // Lấy ID đơn hàng

    // Gửi Ajax request
    $.ajax({
        url: '/admin/orders/confirm-payment', // Đường dẫn đến route xác nhận thanh toán
        type: 'POST',
        data: {
            order_id: orderId,
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            if (response.success) {
              window.location.href = '/admin/order';
                alert('Thanh toán đã được xác nhận và email đã được gửi!');
            } else {
                alert('Có lỗi xảy ra, vui lòng thử lại.');
            }
        }
    });
});
</script>
@endsection