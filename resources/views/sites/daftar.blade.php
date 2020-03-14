@extends('layout.contact')

@section('contentdua')

<div class="super_container">
	<div class="home">
		<div class="home_container">
			<div class="home_background" style="background-image:url({{asset('/frontend')}}/images/cart.jpg)"></div>
			<div class="home_content_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="home_content">
								<div class="breadcrumbs">
									<ul>
										<li><a href="/">Home</a></li>
										<li>Contact</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<div class="contact">
		<div class="container">
			<div class="row">

				<!-- Get in touch -->
				<div class="col-lg-8 contact_col">
					<div class="get_in_touch">
						<div class="section_title">Pendaftaran</div>
						<div class="section_subtitle">Bergabung bersama kami !!</div>
						<div class="contact_form_container">
							<form action="#" id="contact_form" class="contact_form">
								<div class="row">
									<div class="col-xl-12">
										<!-- Name -->
										<label for="contact_name">Nama Lengkap*</label>
										<input type="text" id="contact_name" class="contact_input" required="required">
									</div>
								</div>
								<div>
									<!-- Subject -->
									<label for="contact_company">Email*</label>
									<input type="email" id="contact_company" class="contact_input">
								</div>
								<div>
									<!-- Subject -->
									<label for="contact_company">Password*</label>
									<input type="password" id="contact_company" class="contact_input">
								</div>
								 <div class="form-group">
								    <label for="exampleFormControlSelect1">Pilih Jenis Kelamin</label>
								    <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
								      <option value="L">Laki-laki</option>
								      <option value="P">Perempuan</option>
								    </select>
								  </div>
								  <div>
									<!-- Subject -->
									<label for="contact_company">No Hp*</label>
									<input type="text" id="contact_company" class="contact_input">
								</div>
								<div>
									<label for="contact_textarea">Alamat*</label>
									<textarea id="contact_textarea" class="contact_input contact_textarea" required="required"></textarea>
								</div>
								<button class="button contact_button"><span>Signup</span></button>
							</form>
						</div>
					</div>
				</div>

				<!-- Contact Info -->
				<div class="col-lg-3 offset-xl-1 contact_col">
					<div class="contact_info">
						<div class="contact_info_section">
							<div class="contact_info_title">Marketing</div>
							<ul>
								<li>Phone: <span>+628 52 6319 8131</span></li>
								<li>Email: <span>sandyeffendi0911@gmail.com</span></li>
							</ul>
						</div>
						<div class="contact_info_section">
							<div class="contact_info_title">Shippiing & Returns</div>
							<ul>
								<li>Phone: <span>+628 52 6319 8131</span></li>
								<li>Email: <span>sandyeffendi0911@gmail.com</span></li>
							</ul>
						</div>
						<div class="contact_info_section">
							<div class="contact_info_title">Information</div>
							<ul>
								<li>Phone: <span>+628 52 6319 8131</span></li>
								<li>Email: <span>sandyeffendi0911@gmail.com</span></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="row map_row">
				<div class="col">

					<!-- Google Map -->
					<div class="map">
						<div id="google_map" class="google_map">
							<div class="map_container">
								<div id="map"></div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
	@stop