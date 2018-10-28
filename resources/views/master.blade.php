<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website bán hàng đồ án tốt nghiệp - Bùi Văn Tuấn </title>
    <base href="{{asset('')}}">
	<link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="front_asset/assets/dest/css/font-awesome.min.css">
	<link rel="stylesheet" href="front_asset/assets/dest/vendors/colorbox/example3/colorbox.css">
	<link rel="stylesheet" href="front_asset/assets/dest/rs-plugin/css/settings.css">
	<link rel="stylesheet" href="front_asset/assets/dest/rs-plugin/css/responsive.css">
	<link rel="stylesheet" title="style" href="front_asset/assets/dest/css/style.css">
	<link rel="stylesheet" href="front_asset/assets/dest/css/animate.css">
	<link rel="stylesheet" title="style" href="front_asset/assets/dest/css/my-style.css">
	<link rel="stylesheet" href="shop/css/jquery.countdown.css" /> <!-- countdown -->
	<link href="{{url('shop/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
	<link href="{{url('shop/css/fasthover.css')}}" rel="stylesheet" type="text/css" media="all" />
	<link href="{{url('shop/css/popuo-box.css')}}" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="css/topscroll.css">
	
</head>
<body>

	@include('header')
	<div class="rev-slider">
        @yield('content')
	</div> <!-- .container -->

	@include('footer')
	<button style="height:50px; width:50px" onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-angle-up"></i></button>
	
	<!-- include js files -->
	<script src="front_asset/assets/dest/js/jquery.js"></script>
	<script src="front_asset/assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	<script src="front_asset/assets/dest/vendors/bxslider/jquery.bxslider.min.js"></script>
	<script src="front_asset/assets/dest/vendors/colorbox/jquery.colorbox-min.js"></script>
	<script src="front_asset/assets/dest/vendors/animo/Animo.js"></script>
	<script src="front_asset/assets/dest/vendors/dug/dug.js"></script>
	<script src="front_asset/assets/dest/js/scripts.min.js"></script>
	<script src="front_asset/assets/dest/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
	<script src="front_asset/assets/dest/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<script src="front_asset/assets/dest/js/waypoints.min.js"></script>
	<script src="front_asset/assets/dest/js/wow.min.js"></script>
	<script src="front_asset/assets/dest/js/custom2.js"></script>
	<script src="js/my.js"></script>
	{{-- <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/my.js"></script> --}}

	<script>
	$(document).ready(function($) {    
		$(window).scroll(function(){
			if($(this).scrollTop()>150){
			$(".header-bottom").addClass('fixNav')
			}else{
				$(".header-bottom").removeClass('fixNav')
			}}
		)
	})
	</script>
</body>
</html>
