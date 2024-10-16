@extends('admin.layoutAdmin')
@section('content')
<style>
  .table-hover tbody tr:hover {
    background-color: #f5f5f5;
  }

  .table-danger {
    background-color: rgba(255, 0, 0, 0.1);
  }

  .table {
    background: white;

  }

  .title-table {
    color: white;
  }
</style>
<div class="container-fluid py-4">
  <div class="row">
    <div class="container mt-5">
      <h2 class="mb-4 title-table">Quản lý Đơn Hàng</h2>
      <table class="table  table-hover">
        <thead>
          <tr>
            <th scope="col">Mã</th>
            <th scope="col">Khách hàng</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Thanh toán</th>
            <th scope="col">Ngày tạo</th>
            <th scope="col">Tổng tiền</th>
            <th scope="col" class="text-center">Chức năng</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($donhang as $item)

          <tr>
            <th scope="row">#{{$item->id}}</th>
            <td>{{$item->user_fullname}}</td>
            <td class="text-primary">@if ($item->trangthai==1)
              Đang chờ duyệt
              @elseif($item->trangthai==2)
              Đang chuẩn bị
              @elseif($item->trangthai==3)
              xuất hàng
              @elseif($item->trangthai==4)
              Giao hàng thành công
              @else
              Đơn hàng đã bị hủy
              @endif
            </td>
            <td>{{$item->thanhtien}}</td>
            <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</td>
            <td>{{number_format($item->total_money)}}₫</td>
            <td class="text-center">
              <a href="{{ route('orderDetail', $item->id) }}" class="btn btn-info btn-sm">Chi tiết</a>
              <i class="fa-solid fa-gear"></i>
              <a href="javascript:void(0)" data-id="{{ $item->id }}" class="btn btn-danger btn-sm deleteOrder">Xóa</a>

            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  $(document).on('click', '.deleteOrder', function() {
    var orderId = $(this).data('id');
    var url = "/admin/orders/" + orderId;

    if (confirm('Bạn có chắc chắn muốn xóa đơn hàng này không?')) {
      $.ajax({
        url: url,
        type: 'DELETE',
        data: {
          _token: '{{ csrf_token() }}'
        },
        success: function(response) {
          console.log(response);

          alert('Đơn hàng đã được xóa thành công!');
          // Xóa dòng đơn hàng trong bảng mà không reload lại trang
          $('tr').has('a[data-id="' + orderId + '"]').remove();
        },
        error: function() {
          alert('Có lỗi xảy ra khi xóa đơn hàng!');
        }
      });
    }
  });
</script>
@endsection