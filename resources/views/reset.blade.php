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

<!--================Login Box Area =================-->
<section class="login_box_area section-margin">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="login_form_inner">
					<h3 class="text-center">Reset password</h3>
					<form class="row login_form" method="post" action="{{route('forgot')}}" id="contactForm">
						@csrf
						<div class="col-md-12 form-group">
							<input type="password" class="form-control" id="name"  name="password" placeholder="New password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'New password'">
							@if ($errors->has('password'))
							<span class="text-danger text-message">{{ $errors->first('email') }}</span>
							@endif
						</div>
						<div class="col-md-12 form-group">
							<input type="password" class="form-control" id="name"  name="Cpassword" placeholder="Confirm Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Confirm Password'">
							@if ($errors->has('cpassword'))
							<span class="text-danger text-message">{{ $errors->first('email') }}</span>
							@endif
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