@extends('layout.master')

@section('content')
	<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<h3 class="page-title">Welcome E-Sparepart</h3>
					<div class="row">
						<div class="col-md-12">
							<!-- PANEL HEADLINE -->
							<div class="panel panel-headline">
								<div class="panel-heading">
									<h3 class="panel-title">E-Commerce</h3>
									<p class="panel-subtitle">Khusus Penjualan Sparepart Sepeda Motor Honda</p>
								</div>
								<div class="panel-body">
									<h4>E-Sparepart PT. Menara Agung</h4>
									<p>Jl Veteran No. 30 Padang</p>
									<p>Sumatera Barat</p>
								</div>
							</div>
							<!-- END PANEL HEADLINE -->
						</div>
						<div class="panel panel-headline">
								<div class="panel-heading">
									<h3 class="panel-title">Informasi</h3>
									<p class="panel-subtitle">Total Pelanggan, Penjualan, Master Barang dan Stock</p>
								</div>
								<div class="panel-body">
								  <div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-database"></i></span>
										<p>
											<span class="number">{{totalStock()}}</span>
											<span class="title">Total Barang Stock</span>
										</p>
									</div>
								   </div>
								    <div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-database"></i></span>
										<p>
											<span class="number">{{totalPelanggan()}}</span>
											<span class="title">Total Pelanggan</span>
										</p>
									</div>
								   </div>
								    <div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-database"></i></span>
										<p>
											<span class="number">{{totalBarang()}}</span>
											<span class="title">Total Master Barang</span>
										</p>
									</div>
								   </div>
								    <div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-database"></i></span>
										<p>
											<span class="number">{{totalPenjualan()}}</span>
											<span class="title">Total Penjualan</span>
										</p>
									</div>
								   </div>
								    <div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-database"></i></span>
										<p>
											<span class="number">{{totalPenjualanDetail()}}</span>
											<span class="title">Total Detail Penjualan</span>
										</p>
									</div>
								   </div>
								</div>
							</div>
						
					</div>
					
				
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>

		
@stop