@extends('layout.master')

@section('content')

	<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<div class="panel-heading">
					<div class="panel panel-profile">
						<div class="clearfix">
							<!-- LEFT COLUMN -->
							<div class="profile-left">
								<!-- PROFILE HEADER -->
								<div class="profile-header">
									<div class="overlay"></div>
									<div class="profile-main">
										<img src="{{asset('admin/assets/img/default.jpg')}}" class="img-circle" alt="Avatar" style="width: 45%;">
									</div>
									<div class="profile-stat">
										<div class="row">
											<div class="col-md-12 stat-item">
												<i class="fa fa-bell"></i> {{$penjualan->penjualandetail->count()}}
												<span>Jumlah Barang yang di Pilih</span>
											</div>

										</div>
									</div>
								</div><br>
							<!-- END PROFILE DETAIL -->
							<center><a href="/sparepart/penjualan/{{$penjualan->id}}/idpdf" target="_blank" class="btn btn-primary"><i class="fa fa-download"></i> Open PDF</a></center>
							</div>

							<!-- END LEFT COLUMN -->
							<!-- RIGHT COLUMN -->
							<div class="profile-right">
								
							   <br><br>
										<h4 class="heading">Info Barang yang di Beli</h4>
										<ul class="list-unstyled list-justify">
											<li>No Faktur <span> {{$penjualan->no_faktur}}</span></li>
											<li>Tgl. Faktur <span>{{$penjualan->tgl_faktur}}</span></li>
											<li>Nama Konsumen <span>{{$penjualan->nama_konsumen}}</span></li>
										</ul>
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Daftar Barang yang di Pilih</h3>
								</div>
								<div class="panel-body">
									
									<table class="table table-striped">
										<thead>
											<tr>
												<th>No</th>
												<th>Kode Barang</th>
												<th>Nama Barang</th>
												<th>Diskon</th>
												<th>Harga</th>
												<th>Qty</th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											<?php $no = 0;?>
											<?php $total = 0;?>
											<?php $total_diskon = 0;?>
											@foreach($penjualan->penjualandetail as $detail)
											<?php $no++ ;?>
											<?php $total_diskon += $detail['diskon'];?>

											<tr>
												<td>{{$no}}</td>	
												<td>{{$detail->kd_barang}}</td>
												<td>{{$detail->nm_barang}}</td>
												<td>{{$detail->diskon}}</td>
												<td>{{$detail->harga_beli}}</td>
												<td>{{$detail->qty}}</td>
											</tr>
											@endforeach
											<tr><td>Total</td><td>Rp.</td><td>{{$penjualan->harga_satuan}}</td><td></td></tr>
											<tr><td>Diskon</td><td>%</td><td>{{$total_diskon}}</td><td></td></tr>
											<tr><th>Grand Total</th><td>Rp.</td><td>{{$penjualan->harga_total}}</td><td></td></tr>
										</tbody>
									</table>
									
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
