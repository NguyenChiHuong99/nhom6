@extends('layout')
@section('content')
<!-- ================ start banner area ================= -->
<section class="blog-banner-area" id="blog">
	<div class="container h-100">
		<div class="blog-banner">
			<div class="text-center">
				<h1>Shop Single</h1>
				<nav aria-label="breadcrumb" class="banner-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">Shop Single</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
</section>
<!-- ================ end banner area ================= -->


<!--================Single Product Area =================-->
<div class="product_image_area">
	<div class="container">
		<div class="row s_product_inner">
			<div class="col-lg-6">
				<div class="owl-carousel owl-theme s_Product_carousel">
					<div class="single-prd-item">
						<img class="img-fluid" src="/img/product/{{$product->img}}" alt="">
					</div>
					<!-- <div class="single-prd-item">
							<img class="img-fluid" src="/img/product/{{$product->img}}" alt="">
						</div>
						<div class="single-prd-item">
							<img class="img-fluid" src="/img/product/{{$product->img}}" alt="">
						</div> -->
				</div>
			</div>
			<div class="col-lg-5 offset-lg-1">
				<div class="s_product_text">
					<h3>{{$product->name}}</h3>
					<h2>{{number_format($product->price,0,'.',',')}}VNĐ</h2>
					<ul class="list">
						<li><a class="active" href="#"><span>Category</span> : Household</a></li>
						<li><a href="#"><span>Availibility</span> : In Stock</a></li>
					</ul>
					<p>Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for
						something that can make your interior look awesome, and at the same time give you the pleasant warm feeling
						during the winter.</p>
					<div class="product_count">
						<label for="qty">Quantity:</label>
						@auth
						<input type="number" ng-model="quantity" name="qty" id="sst" size="2" maxlength="12" value="1" title="Quantity:" class="input-text qty">
						<a class="button primary-btn" ng-click="addToCart({{$product->id}},quantity)" href="javascript:void(0)">Add to Cart</a>
						@endauth
						@guest
						<input type="number" ng-model="quantity" name="qty" id="sst" size="2" maxlength="12" value="1" title="Quantity:" class="input-text qty">
						<a class="button primary-btn"  href="/QTstore/login">Add to Cart</a>
						@endguest
					</div>
					<div class="card_area d-flex align-items-center">
						<a class="icon_btn" href="#"><i class="fa-solid fa-gem "></i></a>
						<a class="icon_btn" href="#"><i class="fa-solid fa-heart"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--================End Single Product Area =================-->

<!--================Product Description Area =================-->
<section class="product_description_area">
	<div class="container">
		<ul class="nav nav-tabs" id="myTab" role="tablist">
			<li class="nav-item">
				<a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Specification</a>
			</li>
			<li class="nav-item">
				<a class="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Reviews</a>
			</li>
		</ul>
		<div class="tab-content" id="myTabContent">
			<div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
				<p>Beryl Cook is one of Britain’s most talented and amusing artists .Beryl’s pictures feature women of all shapes
					and sizes enjoying themselves .Born between the two world wars, Beryl Cook eventually left Kendrick School in
					Reading at the age of 15, where she went to secretarial school and then into an insurance office. After moving to
					London and then Hampton, she eventually married her next door neighbour from Reading, John Cook. He was an
					officer in the Merchant Navy and after he left the sea in 1956, they bought a pub for a year before John took a
					job in Southern Rhodesia with a motor company. Beryl bought their young son a box of watercolours, and when
					showing him how to use it, she decided that she herself quite enjoyed painting. John subsequently bought her a
					child’s painting set for her birthday and it was with this that she produced her first significant work, a
					half-length portrait of a dark-skinned lady with a vacant expression and large drooping breasts. It was aptly
					named ‘Hangover’ by Beryl’s husband and</p>
				<p>It is often frustrating to attempt to plan meals that are designed for one. Despite this fact, we are seeing
					more and more recipe books and Internet websites that are dedicated to the act of cooking for one. Divorce and
					the death of spouses or grown children leaving for college are all reasons that someone accustomed to cooking for
					more than one would suddenly need to learn how to adjust all the cooking practices utilized before into a
					streamlined plan of cooking that is more efficient for one person creating less</p>
			</div>
			<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
				<div class="table-responsive">
					<table class="table">
						<tbody>
							<tr>
								<td>
									<h5>Width</h5>
								</td>
								<td>
									<h5>128mm</h5>
								</td>
							</tr>
							<tr>
								<td>
									<h5>Height</h5>
								</td>
								<td>
									<h5>508mm</h5>
								</td>
							</tr>
							<tr>
								<td>
									<h5>Depth</h5>
								</td>
								<td>
									<h5>85mm</h5>
								</td>
							</tr>
							<tr>
								<td>
									<h5>Weight</h5>
								</td>
								<td>
									<h5>52gm</h5>
								</td>
							</tr>
							<tr>
								<td>
									<h5>Quality checking</h5>
								</td>
								<td>
									<h5>yes</h5>
								</td>
							</tr>
							<tr>
								<td>
									<h5>Freshness Duration</h5>
								</td>
								<td>
									<h5>03days</h5>
								</td>
							</tr>
							<tr>
								<td>
									<h5>When packeting</h5>
								</td>
								<td>
									<h5>Without touch of hand</h5>
								</td>
							</tr>
							<tr>
								<td>
									<h5>Each Box contains</h5>
								</td>
								<td>
									<h5>60pcs</h5>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
				<div class="row">
					<div class="col-lg-6">
						<div class="comment_list">
							<div class="review_item">
								<div class="media">
									<div class="d-flex">
										<img src="img/product/review-1.png" alt="">
									</div>
									<div class="media-body">
										<h4>Blake Ruiz</h4>
										<h5>12th Feb, 2018 at 05:56 pm</h5>
										<a class="reply_btn" href="#">Reply</a>
									</div>
								</div>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
									dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
									commodo</p>
							</div>
							<div class="review_item reply">
								<div class="media">
									<div class="d-flex">
										<img src="img/product/review-2.png" alt="">
									</div>
									<div class="media-body">
										<h4>Blake Ruiz</h4>
										<h5>12th Feb, 2018 at 05:56 pm</h5>
										<a class="reply_btn" href="#">Reply</a>
									</div>
								</div>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
									dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
									commodo</p>
							</div>
							<div class="review_item">
								<div class="media">
									<div class="d-flex">
										<img src="img/product/review-3.png" alt="">
									</div>
									<div class="media-body">
										<h4>Blake Ruiz</h4>
										<h5>12th Feb, 2018 at 05:56 pm</h5>
										<a class="reply_btn" href="#">Reply</a>
									</div>
								</div>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
									dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
									commodo</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
				<div class="row">
					<div class="col-lg-6">
						<div class="row total_rate">
							<div class="col-6">
								<div class="box_total">
									<h5>Overall</h5>
									<h4>4.0</h4>
									<h6>(03 Reviews)</h6>
								</div>
							</div>
							<div class="col-6">
								<div class="rating_list">
									<h3>Based on 3 Reviews</h3>
									<ul class="list">
										<li><a href="#">5 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
										<li><a href="#">4 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
										<li><a href="#">3 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
										<li><a href="#">2 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
										<li><a href="#">1 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="review_list">
							<div ng-repeat="bl in dsBL" class="review_item">
								<div class="media">
									<div class="d-flex">
										<img src="img/product/review-1.png" alt="">
									</div>
									<div class="media-body">
										<h4>@{{bl.user_fullname}}</h4>
										<span>@{{bl.created_at | date:'dd/MM/yyyy HH:mm:ss'}}</span><br>
										<i ng-show="bl.rating>=1" class="fa-solid fa-star text-warning"></i>
										<i ng-show="bl.rating>=2" class="fa-solid fa-star text-warning"></i>
										<i ng-show="bl.rating>=3" class="fa-solid fa-star text-warning"></i>
										<i ng-show="bl.rating>=4" class="fa-solid fa-star text-warning"></i>
										<i ng-show="bl.rating==5" class="fa-solid fa-star text-warning"></i>
										<i ng-show="bl.rating<5" class="fa-regular fa-star text-warning"></i>
										<i ng-show="bl.rating<4" class="fa-regular fa-star text-warning"></i>
										<i ng-show="bl.rating<3" class="fa-regular fa-star text-warning"></i>
										<i ng-show="bl.rating<2" class="fa-regular fa-star text-warning"></i>
										<i ng-show="bl.rating<1" class="fa-regular fa-star text-warning"></i>
									</div>
								</div>
								<p>@{{bl.content}}</p>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="review_box">
							<h4>Add a Review</h4>
							<div class="form-contact form-review mt-3">

								<div class="form-group my-2">
									<select name="rating" ng-model="rating" class="form-control" id="">
										<option value="5">5 stars</option>
										<option value="4">4 stars</option>
										<option value="3">3 stars</option>
										<option value="2">2 stars</option>
										<option value="1">1 star</option>
									</select>
								</div>
								<div class="form-group">
									<textarea class="form-control different-control w-100" ng-model="content" name="textarea" id="textarea" cols="30" rows="5" placeholder="Enter Message"></textarea>
								</div>
							@auth

							<div class="form-group text-center text-md-right mt-3">
								<button ng-click="sendComment()" type="submit" class="button button--active button-review">Comment</button>
							</div>
							@endauth
							@guest
							<div class="alert alert-info">
									Bạn cần <a href="{{route('loginUser')}}">đăng nhập</a> để đánh giá
							</div>
							@endguest

								</d>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</section>
<!--================End Product Description Area =================-->

<!-- ================ Start related Product area =================-->
<!-- <section class="related-product-area section-margin--small mt-0">
	<div class="container">
		<div class="section-intro pb-60px">
			<p>Popular Item in the market</p>
			<h2>Top <span class="section-intro__style">Product</span></h2>
		</div>
		<div class="row mt-30">
			<div class="col-sm-6 col-xl-3 mb-4 mb-xl-0">
				<div class="single-search-product-wrapper">
					<div class="single-search-product d-flex">
						<a href="#"><img src="img/product/product-sm-1.png" alt=""></a>
						<div class="desc">
							<a href="#" class="title">Gray Coffee Cup</a>
							<div class="price">$170.00</div>
						</div>
					</div>
					<div class="single-search-product d-flex">
						<a href="#"><img src="img/product/product-sm-2.png" alt=""></a>
						<div class="desc">
							<a href="#" class="title">Gray Coffee Cup</a>
							<div class="price">$170.00</div>
						</div>
					</div>
					<div class="single-search-product d-flex">
						<a href="#"><img src="img/product/product-sm-3.png" alt=""></a>
						<div class="desc">
							<a href="#" class="title">Gray Coffee Cup</a>
							<div class="price">$170.00</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-sm-6 col-xl-3 mb-4 mb-xl-0">
				<div class="single-search-product-wrapper">
					<div class="single-search-product d-flex">
						<a href="#"><img src="img/product/product-sm-4.png" alt=""></a>
						<div class="desc">
							<a href="#" class="title">Gray Coffee Cup</a>
							<div class="price">$170.00</div>
						</div>
					</div>
					<div class="single-search-product d-flex">
						<a href="#"><img src="img/product/product-sm-5.png" alt=""></a>
						<div class="desc">
							<a href="#" class="title">Gray Coffee Cup</a>
							<div class="price">$170.00</div>
						</div>
					</div>
					<div class="single-search-product d-flex">
						<a href="#"><img src="img/product/product-sm-6.png" alt=""></a>
						<div class="desc">
							<a href="#" class="title">Gray Coffee Cup</a>
							<div class="price">$170.00</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-sm-6 col-xl-3 mb-4 mb-xl-0">
				<div class="single-search-product-wrapper">
					<div class="single-search-product d-flex">
						<a href="#"><img src="img/product/product-sm-7.png" alt=""></a>
						<div class="desc">
							<a href="#" class="title">Gray Coffee Cup</a>
							<div class="price">$170.00</div>
						</div>
					</div>
					<div class="single-search-product d-flex">
						<a href="#"><img src="img/product/product-sm-8.png" alt=""></a>
						<div class="desc">
							<a href="#" class="title">Gray Coffee Cup</a>
							<div class="price">$170.00</div>
						</div>
					</div>
					<div class="single-search-product d-flex">
						<a href="#"><img src="img/product/product-sm-9.png" alt=""></a>
						<div class="desc">
							<a href="#" class="title">Gray Coffee Cup</a>
							<div class="price">$170.00</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-sm-6 col-xl-3 mb-4 mb-xl-0">
				<div class="single-search-product-wrapper">
					<div class="single-search-product d-flex">
						<a href="#"><img src="img/product/product-sm-1.png" alt=""></a>
						<div class="desc">
							<a href="#" class="title">Gray Coffee Cup</a>
							<div class="price">$170.00</div>
						</div>
					</div>
					<div class="single-search-product d-flex">
						<a href="#"><img src="img/product/product-sm-2.png" alt=""></a>
						<div class="desc">
							<a href="#" class="title">Gray Coffee Cup</a>
							<div class="price">$170.00</div>
						</div>
					</div>
					<div class="single-search-product d-flex">
						<a href="#"><img src="img/product/product-sm-3.png" alt=""></a>
						<div class="desc">
							<a href="#" class="title">Gray Coffee Cup</a>
							<div class="price">$170.00</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section> -->
<!--================ end related Product area ================= -->
@endsection
@section('viewFunction')

<script>
	viewFunction = function($scope, $http) {
		$scope.quantity = 1;
		$scope.dsBL = [];
		$scope.getComment = function() {

			$http.get('/api/comments/product/{{$product->id}}').then(
				function(res) {
					$scope.dsBL = res.data.data;
					console.log($scope.dsBL);
				}

			);
		}
		$scope.getComment();
		console.log($scope.rating);
		$scope.sendComment = function() {
			$http.post('/api/comments', {
				'product_id': `{{$product->id}}`,
				'content': $scope.content,
				 'rating': $scope.rating,
			}).then(
				function(res) {
					$scope.content = '',
						$scope.rating = 5,
						$scope.getComment();
				}
			)
		}
	}
</script>
@endsection