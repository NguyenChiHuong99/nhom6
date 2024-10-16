<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@extends('layout')
@section('title','welcome forgot')
<!-- @section('title2','Trang chu') -->
@section('content')
<!-- ================ start banner area ================= -->
<section class="blog-banner-area" id="category">
	<div class="container h-100">
		<div class="blog-banner">
			<div class="text-center">
				<h1>Reset password</h1>
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

@if (session('status'))
<div>
	{{ session('status') }}
</div>
@endif
<!--================Login Box Area =================-->
<section class="login_box_area section-margin">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="login_form_inner">
					<h3 class="text-center">Reset password</h3>
					<form class="row login_form" method="post" action="{{route('password.update')}}" id="contactForm">
						@csrf
						<input type="hidden" name="token" value="{{$token}}">
						<div class="col-md-12 form-group">
							<input type="email" class="form-control" id="name" value="{{ $email ?? old('email') }}" name="email" placeholder="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'email'">
							@error('email')
							<span>{{ $message }}</span>
							@enderror
						</div>
						<div class="col-md-12 form-group">
							<input type="password" class="form-control" id="name" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
						
						</div>
						<div class="col-md-12 form-group">
							<input id="name" type="password" name="password_confirmation" placeholder="Confirm Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Confirm Password'" required>
							@error('password')
							<span>{{ $message }}</span>
							@enderror
						</div>
						<div class="col-md-12 form-group">
							<button type="submit" value="submit" class="button button-login w-100">Đổi mật khẩu</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>

<!--================End Login Box Area =================-->



@endsection