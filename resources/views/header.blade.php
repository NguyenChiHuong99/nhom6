  <!--================ Start Header Menu Area =================-->
  <header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
          <a class="navbar-brand logo_h" href="index.html"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
              <li class="nav-item "><a class="nav-link" href="{{ route('home') }}">Trang chủ</a></li>
              <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                  aria-expanded="false">Cửa hàng</a>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="{{ route('checkout') }}">Kiểm tra sản phẩm</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{route('confirmation')}}">Xác nhận</a></li>
                </ul>
              </li>
              <li class="nav-item submenu dropdown">
                <!-- <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                  aria-expanded="false">Tin tức</a> -->

              <li class="nav-item"><a class="nav-link" href="{{route('blog')}}">Tin tức</a></li>

              </li>
              <li class="nav-item"><a class="nav-link" href="{{ route('tracking') }}">Theo dõi đơn hàng</a></li>
              <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Liên hệ</a></li>
            </ul>

            <ul class="nav-shop">
              <li class="nav-item">
                <button>
                  <a href="{{ route('cart') }}">
                    <i class="ti-shopping-cart"></i>
                   
                    <span class="nav-shop__circle cart-count" id="cart-count"></span>
                    
                  </a>
                </button>
              </li>
              @if (!Auth::check())
              <li class="nav-item"><a class="button button-header" href="{{ route('loginUser') }}">Đăng nhập</a></li>
              @else
              <li class="nav-item"><a href="/profile"><i class="fa-solid fa-user fa-beat"></i></a></li>
              <li class="nav-item"><a class="button button-header" href="{{ route('logout') }}">Đăng xuất</a></li>

              @endif
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script>
  

  </script>
  <!--================ End Header Menu Area =================-->