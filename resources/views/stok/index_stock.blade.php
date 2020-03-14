
@extends('layout.master')

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
					<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-file-add"></i>
				    Tambah Data Stock
					</button>
					<br><br>
					<form class="navbar-form navbar-left" action="/sparepart/stock/cari" method="GET">
								          <div class="input-group">
								            <input name="cari" type="text" value="" class="form-control" placeholder="Cari Kode Stock .." value="{{old('cari')}}">
								            <span class="input-group-btn"><button type="submit" class="btn btn-primary">Go</button></span>
								          </div>
								        </form>
					<div class="panel">
						<div class="panel-heading">
							 <div class="right">						 
							 <a href="/sparepart/penjualan" class="btn btn-primary"><i class="fa fa-database"></i> Tabel Penjualan</a>
				             <a href="/sparepart/" class="btn btn-primary"><i class="fa fa-database"></i> Tabel Master</a>
				         		</div>
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
											<th>Diskon</th>
											<th>Banyak Stock</th>
											<th>Aksi</th>
										</tr>
										</thead>
										<?php $no = 0;?>
										@foreach($data_stock as $stock)
										<?php $no++ ;?>
										<tr>
											<td>{{$no}}</td>
											<td><a href="/sparepart/stock/{{$stock->id}}/profile">{{$stock->kd_barang}}</a></td>
											<td><a href="/sparepart/stock/{{$stock->id}}/profile">{{$stock->nm_barang}}</a></td>
											<td>Rp. {{$stock->hrg_pp}}</td>
											<td>Rp. {{$stock->hrg_jual}}</td>
											<td>{{$stock->diskon}}%</td>
											<td>{{$stock->banyak_stock}}</td>
											<td><a href="/sparepart/stock/{{$stock->id}}/edit" class="btn btn-warning"><i class="lnr lnr-pencil"></i> Edit</a>
											<a href="#" class="btn btn-danger delete" stock-id="{{$stock->id}}"><i class="lnr lnr-trash"></i> Delete</a></td>
										</tr>
										@endforeach
									</table>
									<h4>Jumlah Barang Stock : {{ $data_stock->total() }} <h4/>
									{{ $data_stock->links() }}
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
				        <h5 class="modal-title" id="exampleModalLabel">Tambah Stock Barang</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				      	<form action="/sparepart/stock/create" method="POST">
				      		{!! csrf_field() !!}
						  <div class="form-group{{$errors->has('kd_barang') ? ' has-error' : ''}}">
						    <label for="exampleKodeBarang">Kode Barang</label>
						    <input name="kd_barang" type="text" class="form-control" id="exampleNamadepan" aria-describedby="kodeBarangHelp" placeholder="Masukkan Kode Barang">
						    @if($errors->has('kd_barang'))
						    	<span class="help-block">{{$errors->first('kd_barang')}}</span>
						    @endif
						  </div>								
						  <div class="form-group{{$errors->has('nm_barang') ? ' has-error' : ''}}">
						    <label for="exampleInputNamaBarang">Nama Barang</label>
						    <input name="nm_barang" type="text" class="form-control" id="exampleNamabelakang" aria-describedby="namaBarangHelp" placeholder="Masukkan Nama Barang">
						    @if($errors->has('nm_barang'))
						    	<span class="help-block">{{$errors->first('nm_barang')}}</span>
						    @endif
						  </div>
						   <div class="form-group{{$errors->has('hrg_pp') ? ' has-error' : ''}}">
						    <label for="exampleKodeBarang">Harga Beli</label>
						    <input name="hrg_pp" type="number" class="form-control" id="exampleHargaBeli" aria-describedby="hargaBeliHelp" placeholder="Masukkan Harga Beli">
						      @if($errors->has('hrg_pp'))
						    	<span class="help-block">{{$errors->first('harga_pp')}}</span>
						    @endif
						  </div>
						  <div class="form-group{{$errors->has('hrg_jual') ? ' has-error' : ''}}">
						    <label for="exampleInputHarga">Harga Jual</label>
						    <input name="hrg_jual" type="number" class="form-control" id="exampleHargajual" aria-describedby="hargaJualHelp" placeholder="Masukkan Harga Jual">
						    @if($errors->has('hrg_jual'))
						    	<span class="help-block">{{$errors->first('hrg_jual')}}</span>
						    @endif
						  </div>
						  <div class="form-group{{$errors->has('diskon') ? ' has-error' : ''}}">
						    <label for="exampleInputDiskon">Diskon</label>
						    <input name="diskon" type="number" class="form-control" id="exampleDiskon" aria-describedby="hargaDiskon" placeholder="Masukkan Diskon">
						    @if($errors->has('diskon'))
						    	<span class="help-block">{{$errors->first('diskon')}}</span>
						    @endif
						  </div>
						  <div class="form-group{{$errors->has('banyak_stock') ? ' has-error' : ''}}">
						    <label for="exampleInputHarga">Banyak Stock</label>
						    <input name="banyak_stock" type="number" class="form-control" id="exampleHargabeli" aria-describedby="banyakStockHelp" placeholder="Masukkan Banyak Stock">
						    @if($errors->has('banyak_stock'))
						    	<span class="help-block">{{$errors->first('banyak_stock')}}</span>
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
<script>
	$('.delete').click(function(){
		var stock_id = $(this).attr('stock-id');
		swal({
		  title: "Yakin?",
		  text: "Mau di Hapus data Stock dengan id "+stock_id+ " ??",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
			console.log(willDelete);
		  if (willDelete) {
		   	window.location = "/sparepart/stock/"+stock_id+"/delete";
		  } 
		});
	});
</script>
@stop
@section('content1')
	
@endsection