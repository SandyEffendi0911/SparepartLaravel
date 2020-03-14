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
									<h3 class="panel-title">Edit Data Pelanggan</h3>
								</div>
								<div class="panel-body">
								<form action="/sparepart/pelanggan/{{$pelanggan->id}}/update" method="POST" enctype="multipart/form-data">
				      				{!! csrf_field() !!}
								  <div class="form-group">
								    <label for="exampleInputNama">Nama Lengkap</label>
								    <input name="nm_pelanggan" type="text" class="form-control" id="exampleNamadepan" aria-describedby="namaDepanHelp" placeholder="Masukkan Nama Lengkap" value="{{$pelanggan->nm_pelanggan}}">
								  </div>
								  <div class="form-group">
								    <label for="exampleFormControlSelect1">Pilih Jenis Kelamin</label>
								    <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
								      <option value="L" @if($pelanggan->jenis_kelamin == 'L') selected @endif >Laki-laki</option>
								      <option value="P" @if($pelanggan->jenis_kelamin == 'P') selected @endif >Perempuan</option>
								    </select>
								  </div>
								  <div class="form-group">
								    <label for="exampleInputNoHp">No Hp</label>
								    <input name="no_hp" type="text" class="form-control" id="exampleNoHp" aria-describedby="noHpHelp" placeholder="Masukkan No Hp" value="{{$pelanggan->no_hp}}">
								  </div>
								  <div class="form-group">
								    <label for="exampleFormControlTextarea1">Alamat</label>
								    <textarea name="alamat" class="form-control" id="exampleAlamat" rows="3">{{$pelanggan->alamat}}</textarea>
								  </div>
								  <div class="form-group">
									    <label for="exampleInputImg">Upload Profile</label>
									    <input name="image" type="file" class="form-control">
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