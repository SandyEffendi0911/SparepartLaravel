<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!--  <link rel="stylesheet" href="{{asset('admin/assets/css/style.css')}}"> -->
	<style type="text/css">
		.p {
			font-family: sans-serif;
			font-size: 15px;
		}
		.b {
			font-family: sans-serif;
		}
		.table1 {
		    font-family: sans-serif;
		    color: #444;
		    border-collapse: collapse;
		    width: 100%;
		    border: 1px solid #f2f5f7;
		}
		 
		.table1 tr th{
		    background: #35A9DB;
		    color: #fff;
		    font-weight: normal;
		    font-size: 14px;
		    font-style: bold;
		}
		 
		.table1, th, td {
		    padding: 8px 20px;
		    text-align: center;
		    font-size: 12px;
		}
		 
		.table1 tr:hover {
		    background-color: #f5f5f5;
		}
		 
		.table1 tr:nth-child(even) {
		    background-color: #f2f2f2;
		}
	</style>
</head>
<body>
<center>
<font face="sans-serif" size="24px" style="color: #35A9DB"><b>PT. Menara Agung</b></font><br>
<font face="sans-serif">Jl Veteran No. 30 Padang</font>
<p><font face="sans-serif" size="20px">Rekap Penjualan Harian</font></p>
<font face="sans-serif">Periode : 2019-01-01 / 2019-01-31</font>
</center>
<!-- <table class="table1"> -->
<table class="table1">
	<thead>
		<tr>
			<th>No</th>
			<th>NO. FAKTUR</th>
			<th>TGL. FAKTUR</th>
			<th>NAMA KONSUMEN</th>
			<th>TOTAL</th>
			<th>HPP</th>
			<th>LABA</th>
		</tr>
	</thead>
	<?php $no = 0;?>
	<?php $laba = 0;?>
	<?php $total_keseluruhan = 0;?>
	<?php $total_hpp = 0;?>		
	<?php $total_laba = 0;?>				
	<tbody>
		@foreach($penjualan as $pl)
		<?php $no++ ;?>	
		<?php $total_keseluruhan += $pl['harga_total'] ;?>
		<?php $total_hpp += $pl['ttl_hpp'] ;?>
		<?php $total_laba += $pl->laba ;?>
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
	</tbody>
</table>
</body>
</html>
