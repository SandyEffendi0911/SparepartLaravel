@extends('layout.master')

@section('header')
<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
@stop
@section('content')
	<div class="main">
		<div class="main-content">
			<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					@if(session('sukses'))					
									<div class="alert alert-success alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
										<i class="fa fa-check-circle"> {{session('sukses')}} </i>
									</div>
									@endif
						<div class="left">
							<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-file-add"></i> 
						    Tambah Data Barang
							</button>
						</div>
						<br>
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Master Barang</h3>
							 <br>
							 <a href="/sparepart/penjualan" class="btn btn-primary"><i class="fa fa-database"></i> Tabel Penjualan</a>
				             <a href="/sparepart/stock" class="btn btn-primary"><i class="fa fa-database"></i>  Tabel Stock</a>
								</div>
							<div class="right">
							  	<form class="navbar-form navbar-left" action="/sparepart/cari" method="GET">
						          <div class="input-group">
						            <input name="cari" type="text" value="" class="form-control" placeholder="Cari Kode Barang .." value="{{old('cari')}}">
						            <span class="input-group-btn"><button type="submit" class="btn btn-primary">Go</button></span>
						          </div>
						        </form>
				    		</div>
								<div class="panel-body">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>No</th>
												<th>Kode Barang</th>
												<th>Nama Barang</th>
												<th>Harga Beli</th>
												<th>Harga Jual</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php $no = 0;?>
											@foreach($data_barang as $barang)
											<?php $no++ ;?>
											<tr>
												<td>{{$no}}</td>
												<td><a href="/sparepart/{{$barang->id}}/profile">{{$barang->kode_barang}}</a></td>
												<td><a href="/sparepart/{{$barang->id}}/profile"> {{$barang->nama_barang}}</a></td>
												<td>Rp. {{$barang->harga_beli}}</td>
												<td><a href="#" class="hargajual" data-type="text" data-pk="{{$barang->id}}" data-url="/api/sparepart/{{$barang->id}}/edithrg" data-title="Masukkan Harga Jual">{{$barang->harga_jual}}</a></td>
												<td><a href="/sparepart/{{$barang->id}}/edit" class="btn btn-warning"><i class="lnr lnr-pencil"></i> Edit</a>
												<a href="#" class="btn btn-danger delete" barang-id="{{$barang->id}}"><i class="lnr lnr-trash"></i> Delete</a></td>
												
											</tr>
											@endforeach
									</tbody>
									{{ $data_barang->links() }}
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
		
	</div>

	<!-- Modal -->
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				      	<form action="/sparepart/create" method="POST">
				      		{!! csrf_field() !!}
						  <div class="form-group{{$errors->has('kode_barang') ? ' has-error' : ''}}">
						    <label for="exampleKodeBarang">Kode Barang</label>
						    <input name="kode_barang" type="text" class="form-control" id="exampleNamadepan" aria-describedby="kodeBarangHelp" placeholder="Masukkan Kode Barang">
						    @if($errors->has('kode_barang'))
						    	<span class="help-block">{{$errors->first('kode_barang')}}</span>
						    @endif
						  </div>
						  <div class="form-group{{$errors->has('nama_barang') ? ' has-error' : ''}}">
						    <label for="exampleInputNamaBarang">Nama Barang</label>
						    <input name="nama_barang" type="text" class="form-control" id="exampleNamabelakang" aria-describedby="namaBarangHelp" placeholder="Masukkan Nama Barang">
						     @if($errors->has('nama_barang'))
						    	<span class="help-block">{{$errors->first('nama_barang')}}</span>
						    @endif
						  </div>
						  <div class="form-group{{$errors->has('harga_jual') ? ' has-error' : ''}}">
						    <label for="exampleInputHarga">Harga Jual</label>
						    <input name="harga_jual" type="number" class="form-control" id="exampleHargajual" aria-describedby="hargaJualHelp" placeholder="Masukkan Harga Jual">
						     @if($errors->has('harga_jual'))
						    	<span class="help-block">{{$errors->first('harga_jual')}}</span>
						    @endif
						  </div>
						  <div class="form-group{{$errors->has('harga_beli') ? ' has-error' : ''}}">
						    <label for="exampleInputHarga">Harga Beli</label>
						    <input name="harga_beli" type="number" class="form-control" id="exampleHargabeli" aria-describedby="hargaBeliHelp" placeholder="Masukkan Harga Beli">
						     @if($errors->has('harga_beli'))
						    	<span class="help-block">{{$errors->first('harga_beli')}}</span>
						    @endif
						  </div>
						  </div>
				      
				      <div class="modal-footer">
				        <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
				        <button type="submit" class="btn btn-primary">Simpan</button>
				      </div>
				      </form>
				      </div>
				    </div>
				  </div>
				</div>
@stop

@section('footer')
<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js">
</script>
<script>
	$(document).ready(function() {
	    $('.hargajual').editable();
	});
	
	$('.delete').click(function(){
		var barang_id = $(this).attr('barang-id');
		swal({
		  title: "Yakin?",
		  text: "Mau di Hapus data Barang dengan id "+barang_id+ " ??",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
			console.log(willDelete);
		  if (willDelete) {
		   	window.location = "/sparepart/"+barang_id+"/delete";
		  } 
		});
	});
</script>
@stop
@section('content1')

@endsection			



	