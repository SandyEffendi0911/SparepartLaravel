<!DOCTYPE html>
<html lang="en">
<head>
<title>E-Sparepart</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Sublime project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{asset('/frontend')}}/styles/bootstrap4/bootstrap.min.css">
<link href="{{asset('/frontend')}}/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{asset('/frontend')}}/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="{{asset('/frontend')}}/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="{{asset('/frontend')}}/plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="{{asset('/frontend')}}/styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="{{asset('/frontend')}}/styles/responsive.css">


</head>
<body>

<div class="super_container">

	<!-- Header -->

	@include('layout.include._header')

	 @include('layout.include._menu')
	<!-- Menu -->

	@yield('content')

	<!-- Footer -->
	
	<div class="footer_overlay"></div>
	<footer class="footer">
		<div class="footer_background" style="background-image:url({{asset('/frontend')}}/images/footer.jpg)"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="footer_content d-flex flex-lg-row flex-column align-items-center justify-content-lg-start justify-content-center">
						<div class="footer_logo"><a href="#">E-Sprepart.</a></div>
						<div class="copyright ml-auto mr-auto">
							<div class="avds_large_content">
<font color="white">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <i class="fa fa-heart-o" aria-hidden="true"></i><br> by <font color="35A9DB"> Sandy Putra Effendi
</div></font></div>
						<div class="footer_social ml-lg-auto">
							<ul>
								<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
</div>

<script src="{{asset('/frontend')}}/js/jquery-3.2.1.min.js"></script>
<script src="{{asset('/frontend')}}/styles/bootstrap4/popper.js"></script>
<script src="{{asset('/frontend')}}/styles/bootstrap4/bootstrap.min.js"></script>
<script src="{{asset('/frontend')}}/plugins/greensock/TweenMax.min.js"></script>
<script src="{{asset('/frontend')}}/plugins/greensock/TimelineMax.min.js"></script>
<script src="{{asset('/frontend')}}/plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="{{asset('/frontend')}}/plugins/greensock/animation.gsap.min.js"></script>
<script src="{{asset('/frontend')}}/plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="{{asset('/frontend')}}/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="{{asset('/frontend')}}/plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="{{asset('/frontend')}}/plugins/easing/easing.js"></script>
<script src="{{asset('/frontend')}}/plugins/parallax-js-master/parallax.min.js"></script>
<script src="{{asset('/frontend')}}/js/custom.js"></script>
</body>
</html>