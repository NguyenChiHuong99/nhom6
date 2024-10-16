@extends('layout')
@section('title','welcome to QTstore')
@section('content')

<!--================ Hero banner start =================-->
<!-- <section class="hero-banner">
      <div class="container">
        <div class="row no-gutters align-items-center pt-60px">
          <div class="col-5 d-none d-sm-block">
            <div class="hero-banner__img">
              <img class="img-fluid" src="img/home/hero-banner.png" alt="">
            </div>
          </div>
          <div class="col-sm-7 col-lg-6 offset-lg-1 pl-4 pl-md-5 pl-lg-0">
            <div class="hero-banner__content">
              <h4>Shop is fun</h4>
              <h1>Browse Our Premium Product</h1>
              <p>Us which over of signs divide dominion deep fill bring they're meat beho upon own earth without morning over third. Their male dry. They are great appear whose land fly grass.</p>
              <a class="button button-hero" href="#">Browse Now</a>
            </div>
          </div>
        </div>
      </div>
    </section> -->
<!--================ Hero banner end =================-->

<!--================ Hero Carousel start =================-->
<section class="section-margin mt-0">
  <div class="owl-carousel owl-theme hero-carousel">
    @foreach ($dmhot as $dm)
    <div class="hero-carousel__slide">
      <img src="{{asset('img/home/'.$dm->img)}}" alt="" class="img-fluid">
      <a href="/category/{{$dm->id}}" class="hero-carousel__slideOverlay">
        <h3>{{$dm->name}}</h3>
        <p>Accessories Item</p>
      </a>
    </div>

    <!-- <div class="hero-carousel__slide">
          <img src="img/home/hero-slide2.png" alt="" class="img-fluid">
          <a href="#" class="hero-carousel__slideOverlay">
            <h3>Wireless Headphone</h3>
            <p>Accessories Item</p>
          </a>
        </div>
        <div class="hero-carousel__slide">
          <img src="img/home/hero-slide3.png" alt="" class="img-fluid">
          <a href="#" class="hero-carousel__slideOverlay">
            <h3>Wireless Headphone</h3>
            <p>Accessories Item</p>
          </a>
        </div> -->
    @endforeach
  </div>
</section>
<!--================ Hero Carousel end =================-->

<!-- ================ trending product section start ================= -->
<section class="section-margin calc-60px">
  <div class="container">
    <div class="section-intro pb-60px">
      <p>Mặt hàng phổ biến trên thị trường</p>
      <h2>Sản phẩm <span class="section-intro__style">Thịnh hành</span></h2>
    </div>
    <div class="row">
      @foreach ( $trendingProducts as $products)
      <div class="col-md-6 col-lg-4 col-xl-3">
        <div class="card text-center card-product">
          <div class="card-product__img">
            @if (file_exists(public_path('storage/product/' . $products->img)))
            <img src="{{ asset('storage/product/' . $products->img) }}" class="card-img" alt="user1">
            @else
            <!-- Hiển thị một ảnh mặc định nếu không tìm thấy ảnh -->
            <img src="{{ asset('img/product/' . $products->img) }}" class="card-img" alt="user1">
            @endif
            <ul class="card-product__imgOverlay">
              <li><button><i class="ti-search"></i></button></li>
              @auth
              <li>
                <button class="add-to-cart-button" data-product-id="{{ $products->id }}" data-quantity="1">
                  <i class="ti-shopping-cart"></i>
              </li>
              @endauth

              @guest
              <li><a href="{{ route('loginUser') }}"><i class="ti-shopping-cart"></i></a></li>
              @endguest

              <li><button><i class="ti-heart"></i></button></li>
            </ul>
          </div>
          <div class="card-body">
            <p>Accessories</p>
            <h4 class="card-product__title"><a href="{{route('detail',['product_id' =>$products->id])}}">{{$products->name}}</a></h4>
            <p class="card-product__price">{{number_format($products->price,0,',','.')}}VNĐ</p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
  <div class="col-12">
    <nav class="blog-pagination justify-content-center d-flex">
      {{ $trendingProducts->links('pagination::bootstrap-4') }}
    </nav>
  </div>
</section>
<!-- ================ trending product section end ================= -->


<!-- ================ offer section start ================= -->
<section class="offer" id="parallax-1" data-anchor-target="#parallax-1" data-300-top="background-position: 20px 30px" data-top-bottom="background-position: 0 20px">
  <div class="container">
    <div class="row">
      <div class="col-xl-5">
        <div class="offer__content text-center">
          <h3>Up To 50% Off</h3>
          <h4>Winter Sale</h4>
          <p>Him she'd let them sixth saw light</p>
          <a class="button button--active mt-3 mt-xl-4" href="#">Shop Now</a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ================ offer section end ================= -->

<!-- ================ Best Selling item  carousel ================= -->
<section class="section-margin calc-60px">
  <div class="container">
    <div class="section-intro pb-60px">
      <p>Mặt hàng phổ biến trên thị trường</p>
      <h2>Phổ biến <span class="section-intro__style">nhất</span></h2>
    </div>
    <div class="owl-carousel owl-theme" id="bestSellerCarousel">
      @foreach ($popularPr as $sp)
      <div class="card text-center card-product">
        <div class="card-product__img">
          <img src="{{ asset('/') }}img/product/{{ $sp->img }}" alt="">
          <!-- <img class="img-fluid" src="{{asset('img/product/product1.png')}}" alt=""> -->
          <ul class="card-product__imgOverlay">
            <li><button><i class="ti-search"></i></button></li>
            <li><button><i class="ti-shopping-cart"></i></button></li>
            <li><button><i class="ti-heart"></i></button></li>
          </ul>
        </div>
        <div class="card-body">
          <p>Accessories</p>
          <h4 class="card-product__title"><a href="single-product.html">{{$sp->name}}</a></h4>
          <p class="card-product__price">{{$sp->price}}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
<!-- ================ Best Selling item  carousel end ================= -->

<!-- ================ Blog section start ================= -->
<section class="blog">
  <div class="container">
    <div class="section-intro pb-60px">
      <h2>Tin mới <span class="section-intro__style">nhất</span></h2>
    </div>

    <div class="row">
      <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
        <div class="card card-blog">
          <div class="card-blog__img">
            <img class="card-img rounded-0" src="{{asset('img/blog/blog1.png')}}" alt="">
          </div>
          <div class="card-body">
            <ul class="card-blog__info">
              <li><a href="#">By Admin</a></li>
              <li><a href="#"><i class="ti-comments-smiley"></i> 2 Comments</a></li>
            </ul>
            <h4 class="card-blog__title"><a href="/blogdetail">The Richland Center Shooping News and weekly shooper</a></h4>
            <p>Let one fifth i bring fly to divided face for bearing divide unto seed. Winged divided light Forth.</p>
            <a class="card-blog__link" href="/blogdetail">Read More <i class="ti-arrow-right"></i></a>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
        <div class="card card-blog">
          <div class="card-blog__img">
            <img class="card-img rounded-0" src="{{asset('img/blog/blog2.png')}}" alt="">
          </div>
          <div class="card-body">
            <ul class="card-blog__info">
              <li><a href="#">By Admin</a></li>
              <li><a href="#"><i class="ti-comments-smiley"></i> 2 Comments</a></li>
            </ul>
            <h4 class="card-blog__title"><a href="/blogdetail">The Shopping News also offers top-quality printing services</a></h4>
            <p>Let one fifth i bring fly to divided face for bearing divide unto seed. Winged divided light Forth.</p>
            <a class="card-blog__link" href="#">Read More <i class="ti-arrow-right"></i></a>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
        <div class="card card-blog">
          <div class="card-blog__img">
            <img class="card-img rounded-0" src="{{asset('img/blog/blog3.png')}}" alt="">
          </div>
          <div class="card-body">
            <ul class="card-blog__info">
              <li><a href="#">By Admin</a></li>
              <li><a href="#"><i class="ti-comments-smiley"></i> 2 Comments</a></li>
            </ul>
            <h4 class="card-blog__title"><a href="single-blog.html">Professional design staff and efficient equipment you’ll find we offer</a></h4>
            <p>Let one fifth i bring fly to divided face for bearing divide unto seed. Winged divided light Forth.</p>
            <a class="card-blog__link" href="#">Read More <i class="ti-arrow-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ================ Blog section end ================= -->

<!-- ================ Subscribe section start ================= -->
<section class="subscribe-position">
  <div class="container">
    <div class="subscribe text-center">
      <h3 class="subscribe__title">Nhận ưu đãi nhanh chóng</h3>
      <div id="mc_embed_signup">
        <form target="_blank" action="" method="get" class="subscribe-form form-inline mt-5 pt-1">
          <div class="form-group ml-sm-auto">
            <input class="form-control mb-1" type="email" name="EMAIL" placeholder="Nhập Email của bạn" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address '">
            <div class="info"></div>
          </div>
          <button class="button button-subscribe mr-auto mb-1" type="submit">Đăng ký ngay</button>
          <div style="position: absolute; left: -5000px;">
            <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
          </div>

        </form>
      </div>

    </div>
  </div>
</section>
<!-- ================ Subscribe section end ================= -->


<script>
  $(document).ready(function() {
    $('.add-to-cart-button').on('click', function(e) {
      var productId = $(this).data('product-id'); // Lấy product_id từ thuộc tính data
      var quantity = $(this).data('quantity'); // Lấy quantity từ thuộc tính data
      $.ajax({
        url: "{{ route('cart.add', ['product_id' => ':product_id']) }}".replace(':product_id', productId), // URL Laravel
        method: "POST", // Phương thức POST
        data: {
          _token: "{{ csrf_token() }}", // Token CSRF
          product_id: productId, // ID sản phẩm
          quantity: quantity // Số lượng sản phẩm
        },
        success: function(response) {
          if (response.status === 'success') {
            updateCartCount()
            $('#cart-count').text(response.cart_count);
            // alert('Đã thêm sản phẩm vào giỏ hàng!');
            // Cập nhật số lượng giỏ hàng hoặc hiển thị thông báo
          }
        },
        error: function(xhr) {
          if (xhr.status === 401) {
            alert('Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng');
            window.location.href = "{{ route('loginUser') }}"; // Chuyển hướng đến trang đăng nhập nếu cần
          } else {
            alert('Có lỗi xảy ra, vui lòng thử lại.');
          }
        }
      });
    });
  });
  updateCartCount()
</script>

@endsection
@section('viewFunction')
<script>
  viewFunction = function($scope, $http) {
    $scope.popularPr = [];
    $scope.getPopularPr = function() {
      $http.get('/api/popular/').then(function(res) {
        $scope.popularPr = res.data.data;
        console.log($scope.popularPr);
      });
    }
    $scope.getPopularPr();
  }
</script>


@endsection