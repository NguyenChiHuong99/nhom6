@extends('layout')
@section('title','Welcome to Cart')
@section('content')
<!-- ================ start banner area ================= -->
<section class="blog-banner-area" id="category">
    <div class="container h-100">
        <div class="blog-banner">
            <div class="text-center">
                <h1>Shopping Cart</h1>
                <nav aria-label="breadcrumb" class="banner-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- ================ end banner area ================= -->



<!--================Cart Area =================-->
<section class="cart_area">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table " id="cart-table">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Sản phẩm</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Tổng tiền</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($cartItems->isEmpty())
                        <p>Giỏ hàng của bạn hiện đang trống.</p>
                        @else
                        @foreach($cartItems as $item)
                        <tr id="item-{{ $item->id }}">
                            <td>
                                <div class="media">
                                    <div class="d-flex">

                                        <img src="{{ asset('/') }}img/product/{{ $item->product->img }}" alt="">
                                    </div>
                                    <div class="media-body">
                                        <p>{{$item->product->name}}</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h5 class="unit-price">{{number_format($item->product->price)}} VNĐ</h5>
                            </td>
                            <td>
                                <div class="product_count">

                                    <input type="number" min="1" class="quantity-input" name="quantity-input" id="sst" data-cart-item-id="{{ $item->id }}" maxlength="12" value="{{$item->quantity}}" class="input-text qty">
                                </div>
                            </td>
                            <td>
                                <h5 class="text-center total-price">{{number_format($item->quantity*$item->product->price)}}VNĐ</h5>
                                <!-- <h5>@{{sp.quantity * sp.price | number}}VNĐ</h5> -->
                            </td>
                            <td class="text-center">
                                <button class="delete-btn btn btn-danger" data-id="{{ $item->id }}">Xóa</button>
                                <!-- <form action="{{ route('cart.remove', $item->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')">Xóa</button>
                                </form> -->
                                <!-- <a href="javascript:void(0)"><i class="fa-solid fa-circle-xmark"></i></a> -->
                            </td>
                        </tr>
                        @endforeach
                        @endif
                        <!-- <tr ng-if="cart.length == 0">
                            <td colspan="5" class="text-center">
                                <div>
                                    <i class="fa-solid fa-cart-shopping" style="font-size:20px"></i>
                                    Không có sản phẩm nào trong giỏ hàng.
                                    <a href="{{route('home')}}" class="btn btn-primary">Tiếp tục mua sắm</a>
                                </div>
                            </td>
                        </tr> -->




                        <!-- <tr class="bottom_button">
                            <td>
                                <a class="button" href="#">Update Cart</a>
                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                                <div class="cupon_text d-flex align-items-center">
                                    <input type="text" placeholder="Coupon Code">
                                    <a class="primary-btn" href="#">Apply</a>
                                    <a class="button" href="#">Have a Coupon?</a>
                                </div>
                            </td>
                        </tr> -->
                        <tr>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                                <h5>Tổng</h5>
                            </td>
                            <td>
                                @auth
                                <h5 id="tong-thanh-tien">{{number_format($totalAmount)}}VNĐ</h5>
                                @endauth
                                @guest
                                <h5 id="tong-thanh-tien">0 VNĐ</h5>

                                @endguest
                                <!-- <h5>@{{ totalCartMoney() | number }}VNĐ</h5> -->

                            </td>
                        </tr>

                        <tr class="shipping_area">
                            <td class="d-none d-md-block">

                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                                <form action="{{route('cartPost')}}" method="post">
                                    @csrf
                                    <div class="shipping_box">

                                        <h6>Thông tin thanh toán</h6>
                                        <input type="text" value="{{(Auth::check())?Auth::user()->name:''}}" name="fullname" placeholder="fullname" class="form-control" required>
                                        <input type="text" value="{{(Auth::check())?Auth::user()->phone:''}}" name="phone" placeholder="phone" class="form-control" required>
                                        <input type="text" value="{{(Auth::check())?Auth::user()->email:''}}" name="email" placeholder="Email address" class="form-control" required>
                                        <input type="text" value="{{(Auth::check())?Auth::user()->address:''}}" name="address" placeholder="Address" class="form-control" required>
                                    </div>

                                    <input type="checkbox" name="agree" id="agree" required>
                                    <label for="agree">Tôi đã đọc và đồng ý các điều khoản của shop</label>

                            </td>

                        </tr>
                        <tr class="out_button_area">

                            <td class="d-none-l">

                            </td>
                            <td class="">

                            </td>
                            <td>

                            </td>
                            <td>
                                @auth
                                <div class="checkout_btn_inner d-flex align-items-center">
                                    <a class="gray_btn" href="{{route('home')}}">Tiếp tục mua sắm</a>
                                    <button class="primary-btn ml-2" type="submit">Thanh toán</button>
                                </div>
                                @endauth
                                @guest
                                <div class="alert alert-warning  ">
                                    <span>Bạn cần </span> <a href="{{route('loginUser')}}"> Đăng nhập</a> để mua hàng
                                </div>
                                @endguest
                            </td>
                        </tr>
                    </tbody>
                    </form>
                </table>
            </div>
        </div>
    </div>

    <script>
        //remove product in cart
        $(document).ready(function() {
            $('.delete-btn').click(function() {
                if (confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')) {
                    var itemId = $(this).data('id');
                    $.ajax({
                        url: '/cart/' + itemId,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {

                            if (response.success) {
                                $('#item-' + itemId).remove();

                                updateCartCount();
                                updateTotal();
                                // Xóa phần tử khỏi DOM
                                // alert(response.message);
                            } else {
                                alert(response.message);
                            }
                        },
                        error: function(xhr) {
                            if (xhr.status === 401) {
                                alert('Vui lòng đăng nhập để xóa sản phẩm.');
                            } else if (xhr.status === 404) {
                                alert('Không tìm thấy sản phẩm.');
                            } else {
                                alert('Có lỗi xảy ra.');
                            }
                        }
                    });
                }
            });
        });

        //change quantity in cart
        $(document).ready(function() {



            $('.quantity-input').on('change', function() {
                var cartItemId = $(this).data('cart-item-id');
                var quantity = $(this).val();
                var $this = $(this);
                var $row = $this.closest('tr');
                var price = parseFloat($row.find('.unit-price').text().replace(' VNĐ', '').replace(/,/g, ''));
                var $totalPriceElement = $row.find('.total-price');


                var totalPrice = price * quantity;

                $totalPriceElement.text(new Intl.NumberFormat('vi-VN').format(totalPrice) + ' VNĐ');

                $.ajax({
                    url: "{{ route('cart.updatecart') }}", // Chỉnh sửa URL cho đúng với route của bạn
                    type: 'GET', // Sử dụng POST để gửi dữ liệu
                    data: {
                        _token: '{{ csrf_token() }}',
                        cart_item_id: cartItemId,
                        quantity: quantity
                    },
                    success: function(response) {


                        if (response.status === 'success') {
                            // Cập nhật tổng thành tiền sau khi cập nhật số lượng
                            updateTotal();

                        } else {
                            // console.error('Lỗi khi cập nhật: ' + response.message);
                        }
                    },
                    error: function(xhr) {
                        // console.error('Cập nhật số lượng thất bại!');
                    }
                });
            });


            // updateTotal();
        });

        $(document).ready(function() {

            // Khi số lượng thay đổi
            $('.quantity-input').on('change', function() {
                var cartItemId = $(this).data('cart-item-id');
                var quantity = $(this).val();

                $.ajax({
                    url: "{{ route('cart.updateicon') }}",
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        cart_item_id: cartItemId,
                        quantity: quantity
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            // Cập nhật số lượng giỏ hàng
                            updateCartCount();
                        } else {
                            console.error('Lỗi khi cập nhật: ' + response.message);
                        }
                    },
                    error: function(xhr) {
                        // console.error('Cập nhật số lượng thất bại!');
                    }
                });
            });

            // Cập nhật số lượng giỏ hàng khi trang được tải
            updateCartCount();
        });
    </script>
 
</section>
<!--================End Cart Area =================-->


<!-- @endsection -->