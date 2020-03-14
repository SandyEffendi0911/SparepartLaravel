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
									<h3 class="panel-title">Edit Data Stock</h3>
								</div>
								<div class="panel-body">
									<form action="/sparepart/stock/{{$stock->id}}/update" method="POST" enctype="multipart/form-data">
							      		{!! csrf_field() !!}
							      	<div class="form-group">
									    <label for="exampleInputKodeBarang">Kode Barang</label>
									    <input name="kd_barang" type="text" class="form-control" id="exampleKodeBarang" aria-describedby="kodeBarangHelp" placeholder="Masukkan Nama Barang" value="{{$stock->kd_barang}}" >
									  </div>
									  <div class="form-group">
									    <label for="exampleInputNamaBarang">Nama Barang</label>
									    <input name="nm_barang" type="text" class="form-control" id="exampleNamaBarang" aria-describedby="namaBarangHelp" placeholder="Masukkan Nama Barang" value="{{$stock->nm_barang}}" >
									  </div>
									  <div class="form-group">
										    <label for="exampleKodeBarang">Harga Beli</label>
										    <input name="hrg_pp" type="number" class="form-control" id="exampleHargaBeli" aria-describedby="hargaBeliHelp" placeholder="Masukkan Harga Beli" value="{{$stock->hrg_pp}}">
									  </div>
									  <div class="form-group">
									    <label for="exampleInputHarga">Harga Jual</label>
									    <input name="hrg_jual" type="number" class="form-control" id="exampleHargabeli" aria-describedby="hargaJualHelp" placeholder="Masukkan Harga Jual" value="{{$stock->hrg_jual}}" >
									  </div>
									    <div class="form-group">
									    <label for="exampleInputDiskon">Diskon</label>
									    <input name="diskon" type="number" class="form-control" id="exampleDiskon" aria-describedby="hargaDiskonHelp" placeholder="Masukkan Diskon" value="{{$stock->diskon}}" >
									  </div>
									  <div class="form-group">
									    <label for="exampleInputHarga">Banyak Stock</label>
									    <input name="banyak_stock" type="number" class="form-control" id="exampleHargabeli" aria-describedby="banyakStockHelp" placeholder="Masukkan Banyak Stock" value="{{$stock->banyak_stock}}" >
									  </div>
									  <div class="form-group">
									    <label for="exampleInputImg">Upload Profile</label>
									    <input name="img" type="file" class="form-control">
									  </div>
									  </div>
							      
							      <div class="modal-footer">
							        <button type="submit" class="btn btn-warning"><i class="lnr lnr-pencil"></i> Update</button>
							      </div>
							      </form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
					
			

@endsection

	
	
