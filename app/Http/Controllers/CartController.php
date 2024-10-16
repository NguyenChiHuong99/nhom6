<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Order;
use App\Models\Cart;
use App\Models\OrderDetail;
use App\Models\ProductsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class CartController extends Controller
{


    public function cart()
    {
        $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();
        $cartProduct = Cart::all();
        $totalAmount = $cartProduct->sum(function ($item) {
            return $item->quantity * $item->product->price;
        });
        //  session()->forget('cart');
        return view('cart', compact('cartItems', 'totalAmount'));
    }

    public function checkout()
    {
        return view('checkout');
    }

    public function getCartCount()
    {

         
        if (auth()->check()) {
            $totalProducts = Cart::where('user_id', auth()->id())
                                 ->distinct('product_id')
                                 ->count('product_id');
    
            return response()->json([
                'status' => 'success',
                'message' => 'Lấy sản phẩm thành công',
                'cart_count' => $totalProducts]);
        }
    
        return response()->json(['cart_count' => 0], 200);
    }



    public function OrderConfirmation()
    {
        return view('orderConfirmation');
    }
    public function tracking()
    {
        $orders = DB::table('orders')
        ->where('user_id', auth()->id())
        ->orderBy('created_at', 'desc')
        ->get();
    
       
        return view('tracking', compact('orders'));
    }
    public function show($id)
    {
        // Tìm chi tiết đơn hàng dựa trên order_id và xác thực rằng người dùng hiện tại sở hữu đơn hàng đó
        $orderDetail = DB::table('orders_details')
            ->where('order_id', $id)
            ->first();
    
        if (!$orderDetail) {
            // Xử lý khi không tìm thấy chi tiết đơn hàng
            return redirect()->route('some.route')->with('error', 'Chi tiết đơn hàng không tồn tại!');
        }
        $orderId = $id;
        // Lấy đơn hàng tương ứng với order_id của chi tiết đơn hàng
        $order = DB::table('orders')->where('id', $orderDetail->order_id)->where('user_id', auth()->id())->first();
    
        if (!$order) {
            // Xử lý khi không tìm thấy đơn hàng sở hữu bởi người dùng
            return redirect()->route('some.route')->with('error', 'Đơn hàng không tồn tại!');
        }
        $orderDetails = OrderDetail::with('product')->where('order_id', $orderId)->get();
        return view('orderDetail', compact('orderDetails', 'order'));
    }
    public function cancel($id)
{
    // Lấy đơn hàng dựa trên ID và user_id để tránh việc user hủy đơn hàng của người khác
    $order = Order::where('id', $id)->where('user_id', auth()->id())->first();

    if (!$order) {
        return redirect()->back()->with('error', 'Không tìm thấy đơn hàng!');
    }

    // Kiểm tra nếu đơn hàng đã được hủy hoặc đã xử lý
    if ($order->trangthai == 5) {
        return redirect()->back()->with('error', 'Đơn hàng đã bị hủy trước đó!');
    }

    // Cập nhật trạng thái đơn hàng thành 'cancelled'
    $order->trangthai = 5;
    $order->save();

    return redirect()->back()->with('success', 'Đơn hàng đã được hủy thành công!');
}

    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


    // public function checkoutPost(Request $request)
    // {
    //     $cartItems = Cart::where('user_id', Auth::id())->get();

    //     if ($cartItems->isEmpty()) {
    //         return redirect()->back()->with('error', 'Giỏ hàng của bạn đang trống!');
    //     }
        
    //     // \Stripe\Stripe::setApiKey(config('stripe.sk'));

    //     $order  = new Order();
    //     $order->user_id = (Auth::check()) ? Auth::user()->id : null;
    //     $order->user_fullname = $request->fullname;
    //     $order->user_phone = $request->phone;
    //     $order->user_address = $request->address;
    //     $order->user_email = $request->email;
    //     $order->total_money = 0;
    //     $order->total_quantity = 0;
    //     $order->save();
    //     foreach ($cartItems as $sp) {
    //         $product = $sp->product;

    //         if (!$product) {
    //             return redirect()->back()->with('error', 'Sản phẩm không tồn tại.');
    //         }
    //         $order_detail = new OrderDetail();
    //         $order_detail->order_id = $order->id;
    //         $order_detail->product_id = $sp->product_id; // Lấy id sản phẩm từ giỏ hàng trong database
    //         $order_detail->quantity = $sp->quantity;
    //         $order_detail->price = $product->price;
    //         $order_detail->save();
    
    //         // Cập nhật tổng tiền và số lượng
    //         $order->total_money += $order_detail->quantity * $order_detail->price;
    //         $order->total_quantity += $order_detail->quantity;
    //     }
    
    //     $kq = $order->save();
    //     if ($kq) {
    //         $successData = [
    //             'title' => 'Thành công!',
    //             'text' => 'Bạn đã đặt hàng thành công thành công!',
    //             'icon' => 'success'
    //         ];

    //         // Đặt dữ liệu vào session
    //         session(['success_data' => $successData]);
    //     }
    //     Cart::where('user_id', Auth::id())->delete();
       
    //     return redirect()->route('home');
    //     //thong báo

    // }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    public function create()
    {
        //
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { //kiểm tra có giỏ hàng chưa
        if (is_null(session('cart'))) {
            session()->put('cart', []);
        }
        $inCart = false; //chưa có sản phẩm trong giỏ hàng
        foreach (session('cart') as $sp) {
            //đã có sản phẩm trong giỏ hàng -> tăng số lượng
            if ($sp->id == $request->product_id) {
                $sp->quantity += $request->quantity;
                $inCart = true;
                break;
            }
        }

        if (!$inCart) {
            //chưa có -> thêm sản phẩm vào giỏ hàng
            $sp = ProductsModel::find($request->product_id);
            $sp->quantity += $request->quantity;
            session()->push('cart', $sp);
        }
        $kq = [
            'status' => true,
            'message' => 'Đã thêm sản phẩm vào giỏ hàng',
            'data' => session('cart'),
        ];
        return response()->json($kq, 200);
    }

    /**
     * Display the specified resource.
     */
  

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    public function addToCart(Request $request)
    {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (auth()->check()) {
            // Tạo hoặc cập nhật giỏ hàng
             Cart::updateOrCreate(
                [
                    'user_id' => auth()->id(),
                    'product_id' => $request->product_id,
                ],
                [
                    'quantity' => DB::raw('quantity + ' . $request->quantity),
                ]
            );
            $totalProducts = Cart::where('user_id', auth()->id())
            ->distinct('product_id')
            ->count('product_id');
            return response()->json([
                'status' => 'success',
                'message' => 'Product added to cart',
                'cart' => $totalProducts
            ]);
        }

        // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập
        // return redirect()->route('loginUser');
    }

    public function showCart()
    {
        // Lấy tất cả các sản phẩm trong giỏ của người dùng hiện tại
        $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();

        // Hiển thị giỏ hàng
        return view('cart', compact('cartItems'));
    }

    public function removeFromCart($cartItemId)
    {
        // Xác thực người dùng đã đăng nhập
        if (auth()->check()) {
            // Tìm và xóa sản phẩm trong giỏ hàng của người dùng
            $cartItem = Cart::where('user_id', auth()->id())
                ->where('id', $cartItemId)
                ->first();

            if ($cartItem) {
                $cartItem->delete();
                return response()->json(['success' => true, 'message' => 'Sản phẩm đã được xóa khỏi giỏ hàng.']);
            }

            return response()->json(['success' => false, 'message' => 'Không tìm thấy sản phẩm trong giỏ hàng.'], 404);
        }

        return response()->json(['success' => false, 'message' => 'Vui lòng đăng nhập để xóa sản phẩm.'], 401);
    }

    public function updateQuantity(Request $request)
    {
        $cartItemId = $request->input('cart_item_id');
        $quantity = $request->input('quantity');


        $cartItem = Cart::find($cartItemId);

        if ($cartItem) {
            $cartItem->quantity = $quantity;
            $cartItem->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Cập nhật số lượng thành công!',
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Không tìm thấy sản phẩm trong giỏ hàng!',
        ], 404);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        foreach (session('cart') as $sp) {
            if ($sp->id == $id) {
                $sp->quantity = $request->quantity;
                break;
            }
        }
        $kq = [
            'status' => true,
            'message' => 'Đã xóa  sản phẩm vào giỏ hàng',
            'data' => session('cart'),
        ];
        return response()->json($kq, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        session()->pull('cart.' . $id); //id là index
        $kq = [
            'status' => true,
            'message' => 'Đã xóa  sản phẩm khỏi giỏ hàng',
            'data' => session('cart'),
        ];

        return response()->json($kq, 200);
    }


    

public function checkoutPost(Request $request)
{
    $cartItems = Cart::where('user_id', Auth::id())->get();

    if ($cartItems->isEmpty()) {
        return redirect()->back()->with('error', 'Giỏ hàng của bạn đang trống!');
    }

    // Tạo đối tượng Order và lưu thông tin đơn hàng
    $order = new Order();
    $order->user_id = (Auth::check()) ? Auth::user()->id : null;
    $order->user_fullname = $request->fullname;
    $order->user_phone = $request->phone;
    $order->user_address = $request->address;
    $order->user_email = $request->email;
    $order->total_money = 0;
    $order->total_quantity = 0;
    $order->save();

    foreach ($cartItems as $sp) {
        $product = $sp->product;

        if (!$product) {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại.');
        }
        $order_detail = new OrderDetail();
        $order_detail->order_id = $order->id;
        $order_detail->product_id = $sp->product_id;
        $order_detail->quantity = $sp->quantity;
        $order_detail->price = $product->price;
        $order_detail->save();

        // Cập nhật tổng tiền và số lượng
        $order->total_money += $order_detail->quantity * $order_detail->price;
        $order->total_quantity += $order_detail->quantity;
    }

    $order->save();

    // Khởi tạo PayPal
    $paypal = new PayPalClient;
    $paypal->setApiCredentials(config('paypal'));
    $token = $paypal->getAccessToken();
    $paypal->setAccessToken($token);

    // Tạo yêu cầu thanh toán qua PayPal
    $response = $paypal->createOrder([
        "intent" => "CAPTURE",
        "purchase_units" => [
            [
                "amount" => [
                    "currency_code" => "USD",
                    "value" => $order->total_money
                ]
            ]
        ],
        "application_context" => [
            "cancel_url" => route('paypal.cancel'),
            "return_url" => route('paypal.success', ['order_id' => $order->id]),
        ]
    ]);

    // Chuyển hướng người dùng đến PayPal để thanh toán
    if (isset($response['id'])) {
        foreach ($response['links'] as $link) {
            if ($link['rel'] === 'approve') {
                return redirect()->away($link['href']);
            }
        }
    }

    return redirect()->route('home')->with('error', 'Có lỗi xảy ra khi tạo yêu cầu thanh toán PayPal.');
}

public function successPayment(Request $request)
{
    $orderId = $request->query('order_id');
    $paypal = new PayPalClient;
    $paypal->setApiCredentials(config('paypal'));
    $token = $paypal->getAccessToken();
    $paypal->setAccessToken($token);

    // Capture thanh toán từ PayPal
    $response = $paypal->capturePaymentOrder($request['token']);

    if (isset($response['status']) && $response['status'] == 'COMPLETED') {
        // Cập nhật trạng thái đơn hàng thành công
        $order = Order::find($orderId);
        if ($order) {
            $order->trangthaithanhtoan = 2;
            $kq = $order->save();
            if ($kq) {
                $successData = [
                    'title' => 'Thành công!',
                    'text' => 'Bạn đã đặt hàng thành công thành công!',
                    'icon' => 'success'
                ];
    
                // Đặt dữ liệu vào session
                session(['success_data' => $successData]);
            }
        }

        // Xóa giỏ hàng sau khi thanh toán thành công
        Cart::where('user_id', Auth::id())->delete();

        return redirect()->route('home')->with('success', 'Thanh toán PayPal thành công.');
    }

    return redirect()->route('home')->with('error', 'Thanh toán PayPal không thành công.');
}

public function cancelPayment()
{
    return redirect()->route('home')->with('error', 'Bạn đã hủy thanh toán PayPal.');
}



    

}
