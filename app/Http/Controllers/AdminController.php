<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\ProductRequest;
use App\Models\AdminModel;
use App\Models\CategoriesModel;
use App\Models\ProductsModel;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Mail\OrderShippedMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function admin()
    {
        return view('admin.dashboard');
    }
    public function products()
    {
        $danhmuc = AdminModel::danhmuc();
        $product = ProductsModel::orderBy('id', 'desc')->paginate(6);
        return view('admin.products', compact('danhmuc', 'product'));
    }
    public function updateTrending(Request $request, $id)
    {
        $product = ProductsModel::find($id);
        //tìm kiếm sản phẩm theo id
        if ($product) {
            $product->trending = $request->has('trending') ? 1 : 0;
            //kiểm tra request xem có trường trending không nếu có đặt giá trị thành 1 
            $kq = $product->save();
            //lưu đối tượng vào database
            if ($kq) {
                // Tạo một mảng chứa tiêu đề và biểu tượng
                $successData = [
                    'title' => 'Thành công!',
                    'text' => 'Bạn đã thay đổi trạng thái thành công!',
                    'icon' => 'success'
                ];

                // Đặt dữ liệu vào session
                session(['success_data' => $successData]);
            }
            return redirect()->back();
        }
    }
    public function addproducts(ProductRequest $request)
    {

        $data = $request->validated();

        // $data = $request->only(['name', 'description', 'price', 'categories_id','quantity']);
        //lưu các giá trị request đã validated vào mảng data
        //
        if ($request->hasFile('image')) {
            //kiểm tra request có file hình hay không





            $imageName = $request->file('image')->getClientOriginalName();
            //lấy tên gốc của file
            $request->file('image')->storeAs('public/product', $imageName);
            //lưu vào thư mục với tên gốc của file
            $data['img'] = $imageName;
            //thêm tên file vào database với key là img tức là cột img
        } else {
            dd('File upload not valid');
        }
        $kq = ProductsModel::create($data);
        if ($kq) {
            // Tạo một mảng chứa tiêu đề và biểu tượng
            $successData = [
                'title' => 'Thành công!',
                'text' => 'Bạn đã thêm 1 sản phẩm mới thành công!',
                'icon' => 'success'
            ];

            // Đặt dữ liệu vào session
            session(['success_data' => $successData]);
        } else {
            $successData = [
                'title' => 'Thất bại!',
                'text' => 'Hành động thất bại!',
                'icon' => 'error'
            ];

            // Đặt dữ liệu vào session
            session(['success_data' => $successData]);
        }

        return redirect()->back();

        //chuyển hướng
        // return redirect()->route('products')->with('success', 'Product added successfully!');

    }
    public function editproduct($id)
    {
        $editproduct = ProductsModel::findOrFail($id);
        $editcategory = CategoriesModel::all();
        return view('admin.editproducts', compact('editproduct', 'editcategory'));
    }
    public function update(Request $request, $id)
    {
        $product = ProductsModel::findOrFail($id);
        $data = $request->only(['name', 'description', 'price', 'category_id', 'quantity']);

        if ($request->hasFile('image')) {
            if ($product->img && Storage::exists('public/product/' . $product->img)) {
                Storage::delete('public/product/' . $product->img);
            }
            $imageName = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/product', $imageName);
            $data['img'] = $imageName;
        } else {
            dd('File upload not valid');
        }

        $kq =   $product->update($data);
        if ($kq) {
            // Tạo một mảng chứa tiêu đề và biểu tượng
            $successData = [
                'title' => 'Thành công!',
                'text' => 'Bạn đã sửa thông tin sản phẩm thành công!',
                'icon' => 'success'
            ];

            // Đặt dữ liệu vào session
            session(['success_data' => $successData]);
        }

        return redirect()->route('products');
    }

    public function delete($id)
    {
        $product = ProductsModel::findOrFail($id);
        // Xóa file hình ảnh nếu tồn tại
        if ($product->img) {
            Storage::delete('public/product/' . $product->img);
        }
        $kq =  $product->delete();
        if ($kq) {
            // Tạo một mảng chứa tiêu đề và biểu tượng
            $successData = [
                'title' => 'Thành công!',
                'text' => 'Sản phẩm đã được xóa!',
                'icon' => 'success'
            ];

            // Đặt dữ liệu vào session
            session(['success_data' => $successData]);
        } else {
            $successData = [
                'title' => 'Thất bại!',
                'text' => 'Hành động thất bại!',
                'icon' => 'error'
            ];

            // Đặt dữ liệu vào session
            session(['success_data' => $successData]);
        }

        return redirect()->back();
    }
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        if (!empty($keyword)) {
            session(['search_keyword' => $keyword]);
        } else {
            session()->forget('search_keyword');
        }

        $keyword = session('search_keyword');


        $productsSearch = ProductsModel::searchProductByName($keyword);


        $products = $productsSearch->paginate(3);


        return view('admin.productsearch', compact('products'))->with('keyword', $keyword);
    }

    public function loginAdmin()
    {

        return view('admin.loginAdmin');
    }
    public function login(AuthRequest $request)
    {
        $info = [
            'email' => $request->input('email'),
            'password' =>   $request->input('password'),
        ];

        if (Auth::attempt($info)) {
            $user = Auth::user();
            if ($user->role === 'admin') {

                $successData = [
                    'title' => 'Thành công!',
                    'text' => 'Bạn đăng nhập thành công!',
                    'icon' => 'success'
                ];

                // Đặt dữ liệu vào session
                session(['success_data' => $successData]);
                return redirect()->route('dashboard');
            } else {
                Auth::logout();
                $successData = [
                    'title' => 'Thất bại!',
                    'text' => 'Bạn không có quyền truy cập!',
                    'icon' => 'error'
                ];

                // Đặt dữ liệu vào session
                session(['success_data' => $successData]);

                return redirect()->back()->withInput();
            }
        }
        $successData = [
            'title' => 'Sai thông tin!',
            'text' => 'Email hoặc mật khẩu không chính xác!',
            'icon' => 'info'
        ];

        // Đặt dữ liệu vào session
        session(['success_data' => $successData]);
        return redirect()->back()->withInput();
    }
    public function user()
    {
        $user = User::orderBy('id', 'desc')->get();


        return view('admin.user', compact('user'));
    }
    public function order()
    {
        $donhang = Order::All();
        return view('admin.order1', compact('donhang'));
    }

    public function orderDetail($id)
    {


        // Lấy chi tiết đơn hàng bằng id
        $donhang =  OrderDetail::where('order_id', $id)->get();
        $order = Order::find($id);
        // Trả về view để hiển thị chi tiết đơn hàng
        return view('admin.orderDetail', compact('donhang', 'order'));
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('loginAdmin');
    }

    public function destroy($id)
    {
        $order = Order::find($id);

        if (!$order) {
            return response()->json(['error' => 'Đơn hàng không tồn tại'], 404);
        }

        $order->delete();
        return response()->json(['success' => 'Đơn hàng đã được xóa thành công'], 200);
    }
    public function updateStatus(Request $request, $id)
    {
        $order = Order::find($id);

        // Cập nhật dữ liệu
        $order->id = $request->input('order_id');
        $order->trangthai = $request->input('trangthai');

        // Lưu thay đổi
        $order->save();
        // Kiểm tra nếu trạng thái thay đổi từ 'chuẩn bị' sang 'xuất hàng'
        // Điều hướng về trang chi tiết đơn hàng sau khi cập nhật thành công
        return redirect()->route('orderDetail', $id);
    }

    public function confirmPayment(Request $request)
    {
        $order = Order::find($request->order_id);

        if (!$order) {
            return response()->json(['success' => false, 'message' => 'Đơn hàng không tồn tại.']);
        }
        // Kiểm tra nếu đơn hàng đã có trạng thái "xuất hàng"
        if ($order->trangthai == 3) {
            // $order->trangthai = 3;
            // $order->save();
            // Gửi email thông báo đơn hàng đã xuất hàng
            Mail::to($order->user->email)->send(new OrderShippedMail($order));

            return response()->json(['success' => true]);
        }

        return response()->json(['error' => true, 'message' => 'Trạng thái đơn hàng chưa phải là xuất hàng']);
    }

    public function updatePaymentStatus($id)
    {
        $order = Order::findOrFail($id);

        // Đảo ngược trạng thái thanh toán
        if ($order->trangthaithanhtoan == 1) {
            $order->trangthaithanhtoan = 2;
        } else {
            $order->trangthaithanhtoan = 1;
        }

        $order->save();

        return redirect()->back()->with('success', 'Trạng thái thanh toán đã được cập nhật!');
    }

    public function printInvoice($orderId)
    {
        $order = Order::with('orderDetails', 'user')->findOrFail($orderId);

        return view('admin.print_invoice', compact('order'));
    }
}
