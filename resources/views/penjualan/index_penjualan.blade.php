@extends('layout.master')

@section('content')
	<div class="main">
		<div class="main-content">
			<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<form class="navbar-form navbar-left" action="/sparepart/penjualan/cari" method="GET">
								          <div class="input-group">
								            <input name="cari" type="text" value="" class="form-control" placeholder="Cari No Faktur .." value="{{old('cari')}}">
								            <span class="input-group-btn"><button type="submit" class="btn btn-primary">Go</button></span>
								          </div>
								        </form>
						<div class="panel">
							<div class="panel-heading">
							 <div class="right">
							 <a href="/sparepart/penjualan/readall" class="btn btn-primary"><i class="fa fa-database"></i> Laporan Penjualan Harian</a>
				             <a href="/sparepart/penjualan/rekapall" class="btn btn-primary"><i class="fa fa-database"></i>  Rekap Penjualan Harian</a>
								</div>
							</div>								  
								<div class="panel-body">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>No</th>
												<th>Tgl Faktur</th>
												<th>No Faktur</th>
												<th>Nama Konsumen</th>
												<th>Jumlah</th>
												<th>Harga Satuan</th>
												<th>Harga Total</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<?php $no = 0;?>
										@foreach($data_penjualan as $penjualan)
										<?php $no++ ;?>
										<tr>
										<td>{{$no}}</td>
										<td>{{$penjualan->tgl_faktur}}</td>
										<td>{{$penjualan->no_faktur}}</td>
										<td>{{$penjualan->nama_konsumen}}</td>
										<td>{{$penjualan->jumlah}}</td>
										<td>Rp. {{$penjualan->harga_satuan}}</td>
										<td>Rp. {{$penjualan->harga_total}}</td>
										<td><a href="/sparepart/penjualan/{{$penjualan->id}}/read" class="btn btn-success"><i class="lnr lnr-bookmark"></i> Lihat</a>
										
										<a href="#" class="btn btn-danger delete" penjualan-id="{{$penjualan->id}}"><i class="lnr lnr-trash"></i> Delete</a>
									    </td>
									</tr>
									@endforeach				
								</table>
								{{ $data_penjualan->links() }}
				</div>
			</div>
		</div>
	</div>

	
@stop

@section('footer')
<script>
	$('.delete').click(function(){
		var penjualan_id = $(this).attr('penjualan-id');
		swal({
		  title: "Yakin?",
		  text: "Mau di Hapus data Penjualan dengan id "+penjualan_id+ " ??",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
			console.log(willDelete);
		  if (willDelete) {
		   	window.location = "/sparepart/penjualan/"+penjualan_id+"/delete";
		  } 
		});
	});
</script>
@stop
@section('content1')
	
@endsection



	