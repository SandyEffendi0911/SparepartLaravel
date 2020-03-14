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
<link rel="stylesheet" type="text/css" href="{{asset('/frontend')}}/styles/contact.css">
<link rel="stylesheet" type="text/css" href="{{asset('/frontend')}}/styles/contact_responsive.css">
</head>
<body>


 	@include('layout.include._header')

	 @include('layout.include._menu')
	<!-- Menu -->

	@yield('contentdua')

	<!-- Footer -->
	
	<div class="footer_overlay"></div>
	<footer class="footer">
		<div class="footer_background" style="background-image:url({{asset('/frontend')}}/images/footer.jpg)"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="footer_content d-flex flex-lg-row flex-column align-items-center justify-content-lg-start justify-content-center">
						<div class="footer_logo"><a href="#">E-Sprepart.</a></div>
						<div class="copyright ml-auto mr-auto"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <font color="35A9DB"> Sandy Putra Effendi
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
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
<script src="{{asset('/frontend')}}/plugins/easing/easing.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
<script src="{{asset('/frontend')}}/js/contact.js"></script>
</body>
</html>