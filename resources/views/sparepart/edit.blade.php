@extends('layout.master')

@section('content')

<div class="main">
		<div class="main-content">
			<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
								<div class="panel-heading">
									@if(session('sukses'))					
									<div class="alert alert-success alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
										<i class="fa fa-check-circle">{{session('sukses')}}</i>
									</div>
									@endif
									<h3 class="panel-title">Edit Data Master</h3>
								</div>
								<div class="panel-body">
									<form action="/sparepart/{{$barang->id}}/update" method="POST" enctype="multipart/form-data">
							      		{!! csrf_field() !!}
									  <div class="form-group">
									    <label for="exampleKodeBarang">Kode Barang</label>
									    <input name="kode_barang" type="text" class="form-control" id="exampleKodeBarang" aria-describedby="kodeBarangHelp" placeholder="Masukkan Kode Barang"  value="{{$barang->kode_barang}}">
									  </div>
									  <div class="form-group">
									    <label for="exampleInputNamaBarang">Nama Barang</label>
									    <input name="nama_barang" type="text" class="form-control" id="exampleNamaBarang" aria-describedby="namaBarangHelp" placeholder="Masukkan Nama Barang"  value="{{$barang->nama_barang}}">
									  </div>
									  <div class="form-group">
									    <label for="exampleInputHarga">Harga Jual</label>
									    <input name="harga_jual" type="number" class="form-control" id="exampleHargajual" aria-describedby="hargaJualHelp" placeholder="Masukkan Harga Jual"  value="{{$barang->harga_jual}}">
									  </div>
									  <div class="form-group">
									    <label for="exampleInputHarga">Harga Beli</label>
									    <input name="harga_beli" type="number" class="form-control" id="exampleHargabeli" aria-describedby="hargaBeliHelp" placeholder="Masukkan Harga Beli"  value="{{$barang->harga_beli}}">
									  </div>
									 <div class="form-group">
									    <label for="exampleInputImg">Upload Profile</label>
									    <input name="avatar" type="file" class="form-control">
									  </div>
									  </div>
							      
							      <div class="modal-footer">
							        <button type="submit" class="btn btn-warning float-left"><i class="lnr lnr-pencil"></i> Update</button>
							      </div>
							      </form>
								</div>
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@stop

@section('content1')	

@endsection

	
	