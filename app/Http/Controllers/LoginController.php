<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\User;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
// use Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Exception;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function LoginPost(AuthRequest $request)
    {
        $info2 = [
            'email' => $request->input('email'),
            'password' =>   $request->input('password'),
        ];

        if (Auth::attempt($info2)) {
            $user = Auth::user();
            $successData = [
                'title' => 'Thành công!',
                'text' => 'Bạn đăng nhập thành công!',
                'icon' => 'success'
            ];

            // Đặt dữ liệu vào session
            session(['success_data' => $successData]);
            return redirect()->route('home');
        } else {
            Auth::logout();

            $successData = [
                'title' => 'Sai thông tin!',
                'text' => 'Email hoặc mật khẩu không chính xác!',
                'icon' => 'info'
            ];

            // Đặt dữ liệu vào session
            session(['success_data' => $successData]);
            return redirect()->route('loginUser')->withInput();
        }
    }
    public function LoginPost1(AuthRequest $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $remember = $request->input('remember');
        $user = User::where('email', $email)->first();
        $canLogin = false;
        if (isset($user)) {
            $canLogin = Hash::check($password, $user->password);
        }
        if ($canLogin) { //cho phép đăng nhập
            Auth::login($user, $remember);
            $successData = [
                'title' => 'Thành công!',
                'text' => 'Bạn đăng nhập thành công!',
                'icon' => 'success'
            ];

            // Đặt dữ liệu vào session
            session(['success_data' => $successData]);
            return redirect()->route('home');
        } else {
            $successData = [
                'title' => 'Thất bại!',
                'text' => 'Email hoặc mật khẩu không đúng!',
                'icon' => 'info'
            ];

            // Đặt dữ liệu vào session
            session(['success_data' => $successData]);
            return back()->withInput();
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('loginUser');
    }

    // Chuyển hướng người dùng đến Google OAuth
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Xử lý callback từ Google
    public function handleGoogleCallback()
    {

        try {
            $user = Socialite::driver('google')->user();
            $finduser = User::where('email', $user->getEmail())->first();

            if ($finduser) {
                Auth::login($finduser);

                return redirect()->intended('/');
            } else {
                // Nếu user chưa tồn tại, tạo mới
                $newUser = User::create([
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'google_id' => $user->getId(),
                    'password' => encrypt('my-google')
                ]);
                Auth::login($newUser);

                return redirect()->intended('/');
            }
        } catch (Exception $e) {
            return redirect('auth/google');
        }
    }


    public function profile()
    {
        return view('profile');
    }
    public function forgot()
    {
        return view('forgot');
    }
    public function reset()
    {
        return view('auth.reset-password');
    }
}
