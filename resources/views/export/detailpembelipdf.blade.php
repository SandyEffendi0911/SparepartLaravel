<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.p {
			font-family: sans-serif;
			font-size: 15px;
		}
		.b {
			font-family: sans-serif;
		}
		.pre {
			font-family: sans-serif;
		}
		.table1 {
		    font-family: sans-serif;
		    color: #444;
		    border-collapse: collapse;
		    width: 80%;
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
<font face="sans-serif" size="24px" style="color: #35A9DB"><b>PT. Menara Agung</b></font><br>
<font face="sans-serif">Jl Veteran No. 30 Padang</font>
<br><br>
<p><font face="sans-serif" size="18px">Info Barang yang di Beli</p></font>
<pre>No Faktur 						: {{$penjualan->no_faktur}}</font></pre>
<pre>Tgl. Faktur 				: {{$penjualan->tgl_faktur}}</pre>
<pre>Nama Konsumen 		: {{$penjualan->nama_konsumen}}</pre>
<table class="table1">
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
</body>
</html>