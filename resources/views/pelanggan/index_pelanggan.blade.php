@extends('layout.master')

@section('content')
<div class="main">
		<div class="main-content">
			<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-file-add"></i>
				    Tambah Pelanggan
					</button>
					<br><br>
					<form class="navbar-form navbar-left" action="/sparepart/pelanggan/cari" method="GET">
								          <div class="input-group">
								            <input name="cari" type="text" value="" class="form-control" placeholder="Cari Nama Pelanggan .." value="{{old('cari')}}">
								            <span class="input-group-btn"><button type="submit" class="btn btn-primary">Go</button></span>
								          </div>
								        </form>
					<div class="panel">
						<div class="panel-heading">
							</dvi>
								<div class="panel-body">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>No</th>
												<th>Nama Pelanggan</th>
												<th>Jenis Kelamin</th>
												<th>No Hp</th>
												<th>Alamat</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<?php $no = 0;?>
										@foreach($data_pelanggan as $pelanggan)
										<?php $no++ ;?>
										<tr>
										<td>{{$no}}</td>
										<td><a href="/sparepart/pelanggan/{{$pelanggan->id}}/profile"> {{$pelanggan->nm_pelanggan}}</td>
										<td>{{$pelanggan->jenis_kelamin}}</td>
										<td>{{$pelanggan->no_hp}}</td>
										<td>{{$pelanggan->alamat}}</td>
										<td><a href="/sparepart/pelanggan/{{$pelanggan->id}}/edit" class="btn btn-success"><i class="lnr lnr-pencil"></i> Edit</a>
										<a href="#" class="btn btn-danger delete" pelanggan-id="{{$pelanggan->id}}"><i class="lnr lnr-trash"></i> Delete</a>
									    </td>
									</tr>
										@endforeach					
								</table>
								{{ $data_pelanggan->links() }}
							</div>
					      </div>
						</div>
					</div>
<!-- Modal -->
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h4 class="modal-title" id="exampleModalLabel">Tambah Pelanggan</h4>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				      	<form action="/sparepart/pelanggan/create" method="POST" enctype="multipart/form-data">
				      		{!! csrf_field() !!}
						  <div class="form-group{{$errors->has('nm_pelanggan') ? ' has-error' : ''}}">
						    <label for="exampleInputNama">Nama Lengkap</label>
						    <input name="nm_pelanggan" type="text" class="form-control" id="exampleNamadepan" aria-describedby="namaDepanHelp" placeholder="Masukkan Nama Lengkap" value="{{old('nm_pelanggan')}}">
						     @if($errors->has('nm_pelanggan'))
						    	<span class="help-block">{{$errors->first('nm_pelanggan')}}</span>
						    @endif
						  </div>
						  <div class="form-group{{$errors->has('email') ? ' has-error' : ''}}">
						    <label for="exampleInputEmail">Email</label>
						    <input name="email" type="email" class="form-control" id="exampleNamadepan" aria-describedby="emailHelp" placeholder="Masukkan Email" value="{{old('email')}}">
						     @if($errors->has('email'))
						    	<span class="help-block">{{$errors->first('email')}}</span>
						    @endif
						  </div>
						  <div class="form-group{{$errors->has('jenis_kelamin') ? ' has-error' : ''}}">
						    <label for="exampleFormControlSelect1">Pilih Jenis Kelamin</label>
						    <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
						      <option value="L"{{(old('jenis_kelamin') == 'L') ? ' selected' : ''}}>Laki-laki</option>
						      <option value="P"{{(old('jenis_kelamin')== 'P') ? ' selected' : ''}}>Perempuan</option>
						    </select>
						  </div>
						  <div class="form-group{{$errors->has('no_hp') ? ' has-error' : ''}} ">
						    <label for="exampleInputNoHp">No Hp</label>
						    <input name="no_hp" type="text" class="form-control" id="exampleNoHp" aria-describedby="noHpHelp" placeholder="Masukkan No Hp" value="{{old('no_hp')}}">
						    @if($errors->has('no_hp'))
						    	<span class="help-block">{{$errors->first('no_hp')}}</span>
						    @endif
						  </div>
						  <div class="form-group{{$errors->has('alamat') ? ' has-error' : ''}}">
						    <label for="exampleFormControlTextarea1">Alamat</label>
						    <textarea name="alamat" class="form-control" id="exampleAlamat" rows="3">{{old('alamat')}}</textarea>
						    @if($errors->has('alamat'))
						    	<span class="help-block">{{$errors->first('alamat')}}</span>
						    @endif
						  </div>
						   <div class="form-group{{$errors->has('image') ? ' has-error' : ''}}">
							<label for="exampleInputImg">Upload Profile</label>
							<input name="image" type="file" class="form-control" value="{{old('image')}}">
							 @if($errors->has('image'))
						    	<span class="help-block">{{$errors->first('image')}}</span>
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
		var pelanggan_id = $(this).attr('pelanggan-id');
		swal({
		  title: "Yakin?",
		  text: "Mau di Hapus data Pelanggan dengan id "+pelanggan_id+ " ??",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
			console.log(willDelete);
		  if (willDelete) {
		   	window.location = "/sparepart/pelanggan/"+pelanggan_id+"/delete";
		  } 
		});
	});
</script>
@stop
@section('content1')
	
@endsection