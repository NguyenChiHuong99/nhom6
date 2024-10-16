<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;
    public function showLinkRequestForm()
    {
        return view('auth.passwords.reset'); // Trỏ đến view mới
    }
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

       $kq = $status = Password::sendResetLink(
            $request->only('email')
        );
            if($kq){
                $successData = [
                    'title' => 'Thành công!',
                    'text' => 'Đã gửi mail thành công kiểm tra hộp thư của bạn!',
                    'icon' => 'success'
                ];
              
                // Đặt dữ liệu vào session
                session(['success_data' => $successData]);
            }
            return back();
        // return $status === Password::RESET_LINK_SENT
        //             ? back()->with(['status' => __($status)])
        //             : back()->withErrors(['email' => __($status)]);
    }
  
}
