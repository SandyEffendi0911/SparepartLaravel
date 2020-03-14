@extends('layout.frontend')

@section('content')
	
	
	<!-- Home -->

	<div class="home">
		<div class="home_slider_container">
			
			<!-- Home Slider -->
			<div class="owl-carousel owl-theme home_slider">
				
				<!-- Slider Item -->
				<div class="owl-item home_slider_item">
					<div class="home_slider_background" style="background-image:url({{asset('/frontend')}}/images/16849.jpg)"></div>
					<div class="home_slider_content_container">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="home_slider_content"  data-animation-in="fadeIn" data-animation-out="animate-out fadeOut">
										<div class="avds_large_content">
										<div class="home_slider_title">A new Online Shop Sparepart.</div>
										<div class="home_slider_subtitle">Solusi Belanja tepat dan cepat bersama kami E-Sparepart Motor Honda </div>
										<div class="button button_light home_button"><a href="#">Shop Now</a></div>
									</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Slider Item -->
				<div class="owl-item home_slider_item">
					<div class="home_slider_background" style="background-image:url({{asset('/frontend')}}/images/16849.jpg)"></div>
					<div class="home_slider_content_container">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="home_slider_content"  data-animation-in="fadeIn" data-animation-out="animate-out fadeOut">
										<div class="avds_large_content">
										<div class="home_slider_title">A new Online Shop Sparepart.</div>
										<div class="home_slider_subtitle">Solusi Belanja tepat dan cepat bersama kami E-Sparepart Motor Honda </div>
										<div class="button button_light home_button"><a href="#">Shop Now</a></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Slider Item -->
				<div class="owl-item home_slider_item">
					<div class="home_slider_background" style="background-image:url({{asset('/frontend')}}/images/16849.jpg)"></div>
					<div class="home_slider_content_container">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="home_slider_content"  data-animation-in="fadeIn" data-animation-out="animate-out fadeOut">
										<div class="avds_large_content">
										<div class="home_slider_title">A new Online Shop Sparepart.</div>
										<div class="home_slider_subtitle">Solusi Belanja tepat dan cepat bersama kami E-Sparepart Motor Honda </div>
										<div class="button button_light home_button"><a href="#">Shop Now</a></div>
									</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

			<!-- Home Slider Dots -->
			
			<div class="home_slider_dots_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="home_slider_dots">
								<ul id="home_slider_custom_dots" class="home_slider_custom_dots">
									<li class="home_slider_custom_dot active">01.</li>
									<li class="home_slider_custom_dot">02.</li>
									<li class="home_slider_custom_dot">03.</li>
								</ul>
							</div>
						</div>
					</div>
				</div>	
			</div>

		</div>
	</div>

	<!-- Ads -->

	<div class="avds">
		<div class="avds_container d-flex flex-lg-row flex-column align-items-start justify-content-between">
			<div class="avds_small">
				<div class="avds_background" style="background-image:url({{asset('/frontend')}}/images/avds_small.jpg)"></div>
				<div class="avds_small_inner">
					<div class="avds_discount_container">
						<img src="{{asset('/frontend')}}/images/discount.png" alt="">
						<div>
							<div class="avds_discount">
								<div>10<span>%</span></div>
								<div>Dapatkan <br>Discount</div>
							</div>
						</div>
					</div>
					<div class="avds_large_content">
						<div class="avds_title">Sparepart</div>
						<div class="avds_link"><a href="categories.html">See More</a></div>
					</div>
				</div>
			</div>
			<div class="avds_large">
				<div class="avds_background" style="background-image:url({{asset('/frontend')}}/images/15256.jpg)"></div>
				<div class="avds_large_container">
					<div class="avds_large_content">
						<div class="avds_title">Online Shop Sparepart</div>
						<div class="avds_text">Solusi Belanja tepat dan cepat bersama kami E-Sparepart Motor Honda.</div>
						<div class="avds_link avds_link_large"><a href="categories.html">See More</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Products -->

	<div class="products">
		<div class="container">
			<div class="row">
				<div class="col">
					
					<div class="product_grid">

						<!-- Product -->
						@foreach($data_stock as $stock)
						<div class="product">
							
							<div class="product_image"><img src="{{$stock->getImage()}}" alt="" style="width: 60%"></div>
							<div class="product_extra product_new"><a href="categories.html">New</a></div>
							<div class="product_content">
								<div class="product_title"><a href="#">{{$stock->nm_barang}}</a></div>
								<div class="product_price">Tersedia : {{$stock->banyak_stock}}</div>
								<div class="product_price">Rp. {{$stock->hrg_jual}}</div>
							</div>
						</div>
						@endforeach
					</div>
					
				</div>
			</div>
		</div>
	</div>

	<!-- Ad -->

	<div class="avds_xl">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="avds_xl_container clearfix">
						<div class="avds_xl_background" style="background-image:url({{asset('/frontend')}}/images/cart.jpg)"></div>
						<div class="avds_xl_content">
							<div class="avds_title">Amazing Devices</div>
							<div class="avds_text">Solusi Belanja tepat dan cepat bersama kami E-Sparepart Motor Honda.</div>
							<div class="avds_link avds_xl_link"><a href="categories.html">See More</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Icon Boxes -->

	

	<!-- Newsletter -->

	<div class="newsletter">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="newsletter_border"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-8 offset-lg-2">
					<div class="newsletter_content text-center">
						<div class="newsletter_title">E-Sparepart</div>
						<div class="newsletter_text"><p>Solusi Belanja tepat dan cepat bersama kami E-Sparepart Motor Honda</p></div>
						<div class="newsletter_form_container">
							<form action="#" id="newsletter_form" class="newsletter_form">
								<input type="email" class="newsletter_input" required="required">
								<button class="newsletter_button trans_200"><span>Solusi Cepat bersama kami !!</span></button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop