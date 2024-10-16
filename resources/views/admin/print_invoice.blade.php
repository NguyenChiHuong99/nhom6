<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="/vendors/bootstrap/bootstrap.min.css">
    <title>phiếu báo giá</title>
    <style>
        /* Style cho hóa đơn */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        h2{
            text-align: center;
        }
        @media print{
           #print{
            display: none;
           }
        }
        
    </style>
</head>
<body>
    <h2>Phiếu báo giá</h2>
    <p class="text-center"><strong>Ngày đặt hàng:</strong> {{ $order->created_at->format('d/m/Y') }}</p>
    <p><strong>Mã đơn hàng:</strong> #{{ $order->id }}</p>
    <p><strong>Khách hàng:</strong> {{ $order->user->name }}</p>
    <p><strong>Đại chỉ:</strong> {{ $order->user_address }}</p>
    <p><strong>Email:</strong> {{ $order->user->email }}</p>

    <table>
        <thead>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Thành tiền </th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->orderDetails as $detail)
            <tr>
                <td>{{ $detail->product->name }}</td>
                <!-- <td><img src="{{ asset('img/product/' . $detail->product->img) }}" style="width: 140px ;height:auto;" class="avatar avatar-md me-4" alt="Ảnh sản phẩm"></td> -->
                <td>{{ $detail->quantity }}</td>
                <td>{{ number_format($detail->price, 2) }}đ</td>
                <td>{{ number_format($detail->quantity * $detail->price, 2) }}đ</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h4 class="my-3">Tổng tiền: {{ number_format($order->total_money, 2) }}đ</h4>

    <button class="btn btn-info" id="print" onclick="window.print()">In hóa đơn</button>
</body>
</html>
