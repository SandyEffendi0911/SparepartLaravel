@extends('layout.master')

@section('content')
	<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<div class="panel panel-profile">
						<div class="clearfix">
							<!-- LEFT COLUMN -->
							<div class="profile-left">
								<!-- PROFILE HEADER -->
								<div class="profile-header">
									<div class="overlay"></div>
									<div class="profile-main">
										<img src="{{$stock->getImage()}}" class="img-circle" alt="Avatar" style="width: 40%;">
									</div>
								</div>
								<div class="profile-detail">
									<div class="profile-info">
										<h4 class="heading">Info</h4>
										<ul class="list-unstyled list-justify">
											<li>Nama Barang <span>{{$stock->nm_barang}}</span></li>
											<li>Kode Barang <span>{{$stock->kd_barang}}</span></li>
											<li>Diskon <span>{{$stock->diskon}}</span></li>
											<li>Harga Beli <span>{{$stock->hrg_pp}}</span></li>
											<li>Harga Jual <span>{{$stock->hrg_jual}}</span></li>
											<li>banyak Stock <span>{{$stock->banyak_stock}}</span></li>
										</ul>
										<div class="text-center"><a href="/sparepart/stock/{{$stock->id}}/edit" class="btn btn-warning">Edit Profile</a></div>
									</div>
								</div>
							<!-- END PROFILE DETAIL -->
							</div>
							<!-- END LEFT COLUMN -->
							<!-- RIGHT COLUMN -->
							<div class="profile-right">
								<h4 class="heading">Detail</h4>
							
								<div class="tab-content">
									<div class="tab-pane fade in active" id="tab-bottom-left1">
										<ul class="list-unstyled activity-timeline">
											<li>
												<i class="fa fa-comment activity-icon"></i>
												<p>Info <a href="#">Detail Stock</a><span class="timestamp"> Detail Info</span></p></p>
											</li>
											<li>
												<i class="fa fa-cloud-upload activity-icon"></i>
												<p>Uploaded Image <a href="#">Profile stock.png</a> to project<a href="#"> New Profile Master Barang</a><span class="timestamp">Profile Image</span></p>
											</li>
											<li>
												<i class="fa fa-plus activity-icon"></i>
												<p>Added <a href="#">Data</a> and <a href="#">List Stock Barang</a><span class="timestamp">Daftar Stock Info</span></p>
											</li>
											<li>
												<i class="fa fa-check activity-icon"></i>
												<p>Finished 80% of all <a href="#">Stock Barang</a><span class="timestamp">Finished All Order</span></p>
											</li>
										</ul>
									</div>
								</div>
								<!-- END TABBED CONTENT -->
							</div>
							<!-- END RIGHT COLUMN -->
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
@stop
