@extends('layout.master')

@section('content')
	<div class="main">
		<div class="main-content">
			<div class="container-fluid">
				<pre>Nama Perusahaan 		: PT. Menara Agung</pre>
				<pre>Nama Laporan 			: Rekap Penjualan Harian</pre>
				<pre>Periode 			: 2019-01-01 / 2019-01-31</pre>
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Rekap Penjualan Harian</h3>
							 <br>
							 <div class="right">
							 <a href="/sparepart/penjualan/exportexcel" class="btn btn-primary"><i class="fa fa-download"></i> Export Excel</a>
				             <a href="/sparepart/penjualan/exportpdf" class="btn btn-primary"><i class="fa fa-download"></i>  Export PDF</a>
								</div>
								 </div>
								<div class="panel-body">
									<table class="table table-hover">				
										<thead>
											<tr>
												<th>No</th>
												<th>No Faktur</th>
												<th>Tanggal</th>
												<th>Pelanggan</th>
												<th>Total</th>
												<th>HPP</th>
												<th>Laba</th>
											</tr>
										</thead>
										<?php $no = 0;?>
										<?php $laba = 0;?>
										<?php $total_keseluruhan = 0;?>
										<?php $total_hpp = 0;?>		
										<?php $total_laba = 0;?>						
										@foreach($penjualan as $pl)
										<?php $no++ ;?>	
										<?php $total_keseluruhan += $pl['harga_total'] ;?>
										<?php $total_hpp += $pl['ttl_hpp'] ;?>
										<?php $laba = $pl['harga_total'] - $pl['ttl_hpp'] ;?>
										<?php $total_laba += $laba ;?>
										
										<tr>
										<td>{{$no}}</td>
										<td>{{$pl->no_faktur}}</td>
										<td>{{$pl->tgl_faktur}}</td>
										<td>{{$pl->nama_konsumen}}</td>
										<td>{{$pl->harga_total}}</td>
										<td>{{$pl->ttl_hpp}}</td>
										<td>{{$pl->laba}}</td>
											
									</tr>

									@endforeach
									<tr><td></td><td></td><td></td><td>Tortal = </td><td>{{$total_keseluruhan}}</td><td>{{$total_hpp}}</td><td>{{$total_laba}}</td></tr>				
								</table>
				</div>
			</div>
		</div>
	</div>

	
		<script src="//code.jquery.com/jquery.js"></script>
		<script type="text/javascript">
		    $(function(){
		    	$("#addAll").click(function(){
		    		var add = 0;
		    		$('#.amt').each(function(){
		    			add += Number($(this).val());
		    		});
		    		$('#print').text("" + add);
		    	});
		    });
		</script>
@stop
@section('content1')
	
@endsection



	