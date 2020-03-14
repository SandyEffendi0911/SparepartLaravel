@extends('layout.master')

@section('content')
	<div class="main">
		<div class="main-content">
			<div class="container-fluid">
				<pre>Nama Perusahaan 		: PT. Menara Agung</pre>
				<pre>Nama Laporan 			: Laporan Penjualan Harian</pre>
				<pre>Periode 			: 2019-01-01 / 2019-01-31</pre>
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Laporan Penjualan Harian</h3>
							<br>
							 <div class="right">
							 <a href="/sparepart/penjualan/exportduaexcel" class="btn btn-primary"><i class="fa fa-download"></i> Export Excel</a>
				             <a href="/sparepart/penjualan/exportduapdf" class="btn btn-primary"><i class="fa fa-download"></i>  Export PDF</a>
								</div>
								</div>
								<div class="panel-body">
									<table class="table table-hover">				
										<thead>
											<tr>
												<th>No</th>
												<th>No Faktur</th>
												<th>Kode barang</th>
												<th>Nama Barang</th>
												<th>Harga</th>
												<th>Diskon</th>
												<th>Qty</th>
												<th>Jumlah</th>
											</tr>
										</thead>
										<?php $no = 0;?>
										<?php $total = 0;?>
										<?php $total_keseluruhan = 0;?>
										@foreach($detailpenjualan as $detail)
										<?php $no++ ;?>
										<?php $total = $detail['harga_beli'] * $detail['qty'];?>
										<?php $total_keseluruhan += $detail['harga_beli'] * $detail['qty'];?>
										<tr>
										<td>{{$no}}</td>
										<td>{{$detail->penjualan->no_faktur}}</td>
										<td>{{$detail->kd_barang}}</td>
										<td>{{$detail->nm_barang}}</td>
										<td>{{$detail->harga_beli}}</td>
										<td>{{$detail->diskon}} %</td>
										<td>{{$detail->qty}}</td>
										<td>{{$total}}</td>
										
										
									</tr>


									@endforeach
									<tr><td></td><td></td><td></td><td></td><td>Total</td><td>=</td><td>Rp. {{$total_keseluruhan}}</td></tr>				
								</table>

						<div id="chartPenjualan">
						</div>
				</div>
			</div>
		</div>
	</div>

	
@stop
@section('footer')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
	Highcharts.chart('chartPenjualan', {
	    chart: {
	        type: 'column'
	    },
	    title: {
	        text: 'Laporan Penjualan Harian'
	    },
	    // subtitle: {
	    //     text: 'Source: WorldClimate.com'
	    // },
	    xAxis: {
	        categories: {!!json_encode($categories)!!},
	        crosshair: true
	    },
	    yAxis: {
	        min: 0,
	        title: {
	            text: 'Qty'
	        }
	    },
	    tooltip: {
	        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
	        // pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
	        //     '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
	        footerFormat: '</table>',
	        shared: true,
	        useHTML: true
	    },
	    plotOptions: {
	        column: {
	            pointPadding: 0.2,
	            borderWidth: 0
	        }
	    },
	    series: [{
	        name: 'Qty',
	        data: {!!json_encode($data)!!} 
	    
	    }]
	    // }, {
	    //     name: 'Berlin',
	    //     data: [42.4, 33.2, 34.5, 39.7, 52.6]

	    // }]
	});
</script>
@stop
@section('content1')
	
@endsection



	