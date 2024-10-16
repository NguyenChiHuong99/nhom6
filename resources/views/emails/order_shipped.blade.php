<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông báo đơn hàng đã xuất kho</title>
</head>
<body>
    <h2>Xin chào {{ $order->user->name }},</h2>

    <p>Chúng tôi xin thông báo đơn hàng <strong>#{{ $order->id }}</strong> của bạn đã được xử lý và đang trên đường vận chuyển.</p>

    <h4>Thông tin đơn hàng:</h4>
    <ul>
        <li><strong>Mã đơn hàng:</strong> #{{ $order->id }}</li>
        <li><strong>Ngày đặt hàng:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</li>
        <li><strong>Trạng thái đơn hàng:</strong> @if ($order->trangthai == 3)
        Xuất hàng
        @endif</li>
    </ul>

    <p>Bạn có thể theo dõi quá trình vận chuyển và các cập nhật liên quan đến đơn hàng tại trang web của chúng tôi.</p>

    <p>Nếu bạn có bất kỳ thắc mắc nào, xin vui lòng liên hệ với chúng tôi qua email hoặc số điện thoại hỗ trợ khách hàng.</p>

    <p>Chân thành cảm ơn bạn đã tin tưởng và mua sắm tại cửa hàng của chúng tôi!</p>

    <p>Trân trọng,<br>
    Đội ngũ hỗ trợ khách hàng</p>
</body>
</html>
