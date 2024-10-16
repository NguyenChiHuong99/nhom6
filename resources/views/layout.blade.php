<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>

  <link rel="stylesheet" href="{{ asset('/vendors/bootstrap/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('/vendors/fontawesome/css/all.min.css')}}">
	<link rel="stylesheet" href="{{ asset('/vendors/themify-icons/themify-icons.css')}}">
  <link rel="stylesheet" href="{{ asset('/vendors/nice-select/nice-select.css')}}">
  <link rel="stylesheet" href="{{ asset('/vendors/owl-carousel/owl.theme.default.min.css')}}">
  <link rel="stylesheet" href="{{ asset('/vendors/owl-carousel/owl.carousel.min.css')}}">
  <script src="https://kit.fontawesome.com/18da679dbe.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <link rel="stylesheet" href="{{asset('/css/style.css')}}">
</head>
<body ng-app="QTstore" ng-controller="ctrl">
    @include('header')
    <x-cart />
   
  <main class="site-main">
   <div ng-controller="viewCtrl">

     @yield('content')
   </div> 

  </main>

 @include('footer')
 @if (session()->has('success_data'))
    @php
        $successData = session('success_data');
    @endphp
    <script>
   
        Swal.fire({
            title: "{{ $successData['title'] }}",
            text: "{{ $successData['text'] }}",
            icon: "{{ $successData['icon'] }}"
        });
    </script>
    @php
    session()->forget('success_data');
    $successData='';
    @endphp
@endif

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


  <script src="{{ asset('/vendors/jquery/jquery-3.2.1.min.js')}}"></script>
  <script src="{{ asset('/vendors/bootstrap/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('/vendors/skrollr.min.js')}}"></script>
  <script src="{{ asset('/vendors/owl-carousel/owl.carousel.min.js')}}"></script>
  <script src="{{ asset('/vendors/nice-select/jquery.nice-select.min.js')}}"></script>
  <script src="{{ asset('/vendors/jquery.ajaxchimp.min.js')}}"></script>
  <script src="{{ asset('/vendors/mail-script.js')}}"></script>
  <script src="{{asset('/js/main.js')}}"></script>
  <script src="{{asset('/js/app.js')}}"></script>
  <script src="{{asset('/js/angular.min.js')}}"></script>

</body>
<!-- <script>
  var app = angular.module('QTstore',[]);
  app.factory('CartService', ['$http', function($http) {
    return {
        getCartQuantity: function() {
            return $http.get('/cart/quantity');
        }
    };
}]);
  app.controller('ctrl',function($scope,$http){
    $scope.cart = {!! json_encode(session('cart')) !!} || [];
    $scope.addToCart = function(product_id,quantity){
      $http.post('/api/cart',{
        product_id:product_id,
        quantity:quantity,
      }).then(function(res){
        $scope.cart =res.data.data;
      });
    }
    $scope.totalCartMoney =function (){
      var total = 0;
      $scope.cart.forEach(sp => {
        total += sp.quantity * sp.price
      });
      return total ? total : 0;
    }
    $scope.removeCart =function (index){
      $http.delete('/api/cart/'+index).then(function(res){
        $scope.cart =res.data.data;
      });
    }
  });
  var viewFunction = function($scope){

  }
</script> -->
@yield('viewFunction');
<script>




  var app = angular.module('QTstore', []);

 
  app.controller('ctrl', function($scope) {
  
});
</script>

</html>