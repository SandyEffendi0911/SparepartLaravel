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
<center>
<font face="sans-serif" size="24px" style="color: #35A9DB"><b>PT. Menara Agung</b></font><br>
<font face="sans-serif">Jl Veteran No. 30 Padang</font>
<p><font face="sans-serif" size="20px">Laporan Penjualan Harian</font></p>
<font face="sans-serif">Periode : 2019-01-01 / 2019-01-31</font>
</center>

<table class="table1">
	<thead>
		<tr>
			<th>No</th>
			<th>NO. FAKTUR</th>
			<th>KODE BARANG</th>
			<th>NAMA BARANG</th>
			<th>HARGA</th>
			<th>DISKON</th>
			<th>QTY</th>
			<th>JUMLAH</th>
		</tr>
	</thead>
	<?php $no = 0;?>
	<?php $total = 0;?>
	<?php $total_keseluruhan = 0;?>
	<tbody>
		@foreach($penjualandetail as $pl)
		<?php $no++ ;?>	
		<?php $total = $pl['harga_beli'] * $pl['qty'];?>
		<?php $total_keseluruhan += $pl['harga_beli'] * $pl['qty'];?>
		<tr>
		<td>{{$no}}</td>
		<td>{{$pl->penjualan->no_faktur}}</td>
		<td>{{$pl->kd_barang}}</td>
		<td>{{$pl->nm_barang}}</td>
		<td>{{$pl->harga_beli}}</td>
		<td>{{$pl->diskon}} %</td>
		<td>{{$pl->qty}}</td>
		<td>{{$total}}</td>
		</tr>
		@endforeach
	</tbody>
	<tr><td></td><td></td><td></td><td></td><td>Total</td><td>=</td><td>Rp. {{$total_keseluruhan}}</td></tr>	
</table>
</body>
</html>