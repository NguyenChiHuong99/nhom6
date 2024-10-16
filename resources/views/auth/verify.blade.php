@extends('layouts.app')

@section('content')
<div class="container">
    <div class="alert alert-success" role="alert">
        Vui lòng kiểm tra email của bạn để xác nhận tài khoản.
        Nếu bạn chưa nhận được email,
        <form action="{{ route('verification.resend') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-link">Nhấn vào đây để gửi lại</button>.
        </form>
    </div>
</div>
@endsection
