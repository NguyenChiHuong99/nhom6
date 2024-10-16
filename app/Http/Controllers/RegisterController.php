<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Rules\ValidEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function Register(){
        return view('register');
    }
    public function RegisterPost(RegisterRequest $request)
    {
        // Validate các trường
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', new ValidEmail],
            'password' => 'required|min:8', // confirmed sẽ tự động kiểm tra password và cpassword
        ]);
        $password = $request->input('password');
        $cpassword = $request->input('cpassword');
        if($password!==$cpassword){
            $successData = [
                'title' => 'Thất bại!',
                'text' => 'Mật khẩu nhập lại không trùng khớp!',
                'icon' => 'info'
            ];
          
            // Đặt dữ liệu vào session
            session(['success_data' => $successData]);
            return back()->withInput();
        }
    
        // Kiểm tra email đã tồn tại
        $user = User::where('email', $request->input('email'))->first();
        if ($user) {
            $successData = [
                'title' => 'Thất bại!',
                'text'  => 'Email đã tồn tại, không thể đăng ký!',
                'icon'  => 'info'
            ];
    
            // Đặt dữ liệu vào session và trở lại trang đăng ký
            session(['success_data' => $successData]);
            return back()->withInput();
        }
    
        // Tạo người dùng mới nếu không có lỗi
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        
       // Chuyển hướng đến trang thông báo yêu cầu xác nhận email
       if ($user->save()) {
            Auth::login($user);
            $user->sendEmailVerificationNotification();
           
            $successData = [
                'title' => 'Thành công!',
                'text'  => 'Bạn đã đăng ký tài khoản thành công!',
                'icon'  => 'success'
            ];
    
            // Đặt dữ liệu vào session
            session(['success_data' => $successData]);
            
            // Redirect về trang login
            return redirect()->route('verification.notice');
        } else {
            // Xử lý lỗi nếu không thể lưu người dùng
            $errorData = [
                'title' => 'Thất bại!',
                'text'  => 'Có lỗi xảy ra, vui lòng thử lại sau!',
                'icon'  => 'error'
            ];
    
            session(['error_data' => $errorData]);
            return back()->withInput();
        }
    }
    
}
