<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@extends('layout')
@section('title','welcome login')
<!-- @section('title2','Trang chu') -->
@section('content')
<!-- ================ start banner area ================= -->
<section class="blog-banner-area" id="category">
	<div class="container h-100">
		<div class="blog-banner">
			<div class="text-center">
				<h1>Login / Register</h1>
				<nav aria-label="breadcrumb" class="banner-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">Login/Register</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
</section>
<!-- ================ end banner area ================= -->

<!--================Login Box Area =================-->
<section class="login_box_area section-margin">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="login_box_img">
					<div class="hover">
						<h4>New to our website?</h4>
						<p>There are advances being made in science and technology everyday, and a good example of this is the</p>
						<a class="button button-account" href="{{route('register')}}">Tạo tài khoản</a>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="login_form_inner">
					<h3 class="text-center">Đăng nhập</h3>
					<form class="row login_form" method="post" action="{{route('loginpost')}}" id="contactForm">
						@csrf
						<div class="col-md-12 form-group">
							<input type="text" class="form-control" id="name" value="{{old('email')}}" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
							@if ($errors->has('email'))
							<span class="text-danger text-message">{{ $errors->first('email') }}</span>
							@endif
						</div>
						<div class="col-md-12 form-group">
							<input type="password" class="form-control" id="name" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
							@if ($errors->has('password'))
							<span class="text-danger text-message">{{ $errors->first('password') }}</span>
							@endif
						</div>
						<div class="col-md-12 form-group">
							<div class="creat_account">
								<input type="checkbox" id="f-option2" name="remember">
								<label for="f-option2">Remember me</label>
							</div>
						</div>
						<div class="col-md-12 form-group">
							<button type="submit" value="submit" class="button button-login w-100">Đăng nhập</button>
							<a href="{{ route('auth.google') }}" class="btn btn-primary">
								Đăng nhập bằng Google
							</a>
							<a href="{{route('forgot')}}">Quên mật khẩu?</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>

<!--================End Login Box Area =================-->



@endsection