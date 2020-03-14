@extends('layout.master')

@section('content')

	<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<div class="panel-heading">
									@if(session('sukses'))					
									<div class="alert alert-success alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
										<i class="fa fa-check-circle">{{session('sukses')}}</i>
									</div>
									@endif
					<div class="panel panel-profile">
						<div class="clearfix">
							<!-- LEFT COLUMN -->
							<div class="profile-left">
								<!-- PROFILE HEADER -->
								<div class="profile-header">
									<div class="overlay"></div>
									<div class="profile-main">
										<img src="{{$pelanggan->getAvatar()}}" class="img-circle" alt="Avatar" style="width: 45%;">
									</div>
									<div class="profile-stat">
										<div class="row">
											<div class="col-md-12 stat-item">
												<i class="fa fa-bell"></i>
												{{$pelanggan->stock->count()}}<span>Jumlah Barang yang di Pilih</span>
											</div>
										</div>
									</div>
								</div><br>
								<div class="text-center"><a href="/sparepart/pelanggan/{{$pelanggan->id}}/edit" class="btn btn-warning"><i class="lnr lnr-pencil"></i> Edit Profile</a></div>
							<!-- END PROFILE DETAIL -->
							</div>
							<!-- END LEFT COLUMN -->
							<!-- RIGHT COLUMN -->
							<div class="profile-right">
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-shopping-cart"></i>
								   Tambah Keranjang
								</button>
							   <br><br>
										<h4 class="heading">Info</h4>
										<ul class="list-unstyled list-justify">
											<li>Nama Pelanggan <span> {{$pelanggan->nm_pelanggan}}</span></li>
											<li>No Hp <span>{{$pelanggan->no_hp}}</span></li>
											<li>Alamat <span>{{$pelanggan->alamat}}</span></li>

										</ul>
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Daftar Barang yang di Pilih</h3>
								</div>
								<div class="panel-body">
									 <form action="/sparepart/penjualan/create" method="POST">
									      {!! csrf_field() !!}
									<table class="table table-striped">
										<thead>
											<tr>
												<th>No</th>
												<th>Kode Barang</th>
												<th>Nama Barang</th>
												<th>Diskon</th>
												<th>Harga</th>
												<th>Jumlah</th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											<?php $no = 0;?>
											<?php $total = 0;?>
											<?php $total_diskon = 0;?>
											<?php $grand_total = 0;?>
											<?php $total_jumlah = 0;?>
											<?php $total_pp = 0;?>
											@foreach($pelanggan->stock as $stock)
											<?php $no++ ;?>
											<?php $total += $stock->pivot->total;?>
											<?php $total_diskon += $stock['diskon'];?>
											<?php $grand_diskon = $total_diskon/100 * $total ;?>
											<?php $grand_total = $total - $grand_diskon;?>
											<?php $total_jumlah += $stock->pivot->jumlah_beli;?>
											<?php $total_pp += $stock->pivot->hpp;?>
											<tr>
												<td>
													<input
														name="details[{{$no}}][kd_barang]"
														type="hidden" class="form-control"
														value="{{$stock->kd_barang}}">
													<input
														name="details[{{$no}}][nm_barang]"
														type="hidden" class="form-control"
														value="{{$stock->nm_barang}}">
													<input
														name="details[{{$no}}][harga_beli]"
														type="hidden" class="form-control"
														value="{{$stock->hrg_jual}}">
													<input
														name="details[{{$no}}][diskon]"
														type="hidden" class="form-control"
														value="{{$stock->diskon}}">
													<input
														name="details[{{$no}}][qty]"
														type="hidden" class="form-control"
														value="{{$stock->pivot->jumlah_beli}}">	
													{{$no}}
												</td>
												<td>{{$stock->kd_barang}}</td>
												<td>{{$stock->nm_barang}}</td>
												<td>{{$stock->diskon}}%</td>
												<td>{{$stock->hrg_jual}}</td>
												<td class="hidden">{{$stock->pivot->hpp}}</td>
												<td>{{$stock->pivot->jumlah_beli}}</td>
												<td><a href="#" class="delete" buyclose-id = "{{$pelanggan->id}}/{{$stock->id}}" ><i class="lnr lnr-trash"></i></a></td>
											</tr>
											@endforeach
											<tr><td>Total</td><td>Rp.</td><td>{{$total}}</td><td></td></tr>
											<tr><td>Diskon</td><td>%</td><td>{{$total_diskon}}</td><td></td></tr>
											<tr><th>Grand Total</th><td>Rp.</td><td>{{$grand_total}}</td><td></td></tr>
										</tbody>
									</table>
									<!--  <form action="/sparepart/penjualan/create" method="POST">
									      {!! csrf_field() !!} -->
										<div class="form-group">
										<div class="form-group">
										<input name="pelanggan_id" type="hidden" class="form-control" id="pelanggan_id" aria-describedby="Help" readonly="readonly" value="{{$pelanggan->id}}">
										</div>
										<input name="nama_konsumen" type="hidden" class="form-control" id="nama_konsumen" aria-describedby="namKonsumenHelp" readonly="readonly" value="{{$pelanggan->nm_pelanggan}}">
										</div>
										<div class="form-group">
										<input name="jumlah" type="hidden" class="form-control" id="jumlah" aria-describedby="jumlahBeliHelp" value="{{$total_jumlah}}">
										</div>
										<div class="form-group">
										<input name="harga_satuan" type="hidden" class="form-control" id="harga_satuan" aria-describedby="hargaSatuanHelp"  readonly="readonly" value="{{$total}}">
										</div>
										<input name="ttl_hpp" type="hidden" class="form-control" id="ttl_hpp" aria-describedby="TotalHppHelp"  readonly="readonly" value="{{$total_pp}}">
										</div>
										<div class="form-group">
										<input name="harga_total" type="hidden" class="form-control" id="harga_total" aria-describedby="hargaTotalHelp"  readonly="readonly" value="{{$grand_total}}">
										</div>
							      </div>
							      <div class="modal-footer">
							        <button type="submit" class="btn btn-primary">Simpan</button>
							         </form>

								</div>
							</div>
								<!-- END TABBED CONTENT -->
							</div>
							<!-- END RIGHT COLUMN -->
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>

		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Tambah Keranjang</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <form action="/sparepart/pelanggan/{{$pelanggan->id}}/addbuy" method="POST">
				      {!! csrf_field() !!}
				      <div class="form-group">
					    <label for="kd_barang">Nama Barang</label>
					    <select class="form-control" id="kd_barang" name="kd_barang">
					      @foreach($suplai as $sp)
					      <option value = "{{$sp->id}}">{{$sp->nm_barang}}</option>
					        
					      @endforeach
					    </select>
					  </div>
					<div class="form-group">
					<label for="exampleHarga">Stock</label>
					<input name="banyak_stock" type="number" class="form-control" id="banyak_stock" aria-describedby="banyakStockHelp" readonly="readonly" placeholder="Banyak Stock">
					</div>
					<div class="form-group">
					<label for="exampleHarga">Harga Jual</label>
					<input name="hrg_jual" type="number" class="form-control" id="hrg_jual" aria-describedby="HargaJualHelp" readonly="readonly" placeholder="Harga Jual">
					</div>
					<div class="form-group">
					<input name="harga_pp" type="number" class="form-control" id="hrg_pp" aria-describedby="HargaHppHelp" readonly="readonly" placeholder="HPP">
					</div>
					<div class="form-group">
					<input name="hpp" type="number" class="form-control" id="total_hpp" aria-describedby="HargaHppHelp" readonly="readonly" placeholder="Total HPP">
					</div>
					<div class="form-group">
					<label for="exampleJumah">Jumlah Beli</label>
					<input name="jumlah_beli" type="number" class="form-control" id="jumlah_beli" aria-describedby="jumlahBeliHelp" placeholder="Masukkan Jumlah Beli" placeholder="Jumlah Pesan">
					</div>
					<div class="form-group">
					<label for="exampleTotal">Total</label>
					<input name="total" type="number" class="form-control" id="total" aria-describedby="totalHelp" placeholder="Total" readonly="readonly">
					</div>
		      </div>
		      <div class="modal-footer">
		        <button type="submit" class="btn btn-primary">Simpan</button>
		         </form>
		      </div>
		    </div>
		  </div>
		</div>
		<script src="//code.jquery.com/jquery.js"></script>
		<script type="text/javascript">
		    $(document).ready(function(){
		   		var suplai = @json($suplai);
		   		var suplaiHarga = @json($suplaiHarga);
		   		var bnyk_stock = @json($bnyk_stock);
		   		var hargaPP = @json($hargaPP);

		   		console.log(suplai);
		   		console.log(suplaiHarga);
		   		console.log(bnyk_stock);
		   		console.log(hargaPP);

		   		$('#kd_barang').on('change', function(event) {
                    event.preventDefault();
                    /* Act on the event */
                    var kd_barang = $(this).val();
                    console.log(kd_barang );

                    var harga = suplaiHarga[kd_barang];
                    console.log(harga);

                    $('#hrg_jual').val(harga);
                });

                $('#kd_barang').on('change', function(event) {
                    event.preventDefault();
                    /* Act on the event */
                    var kd_barang = $(this).val();
                    console.log(kd_barang );

                    var harga_pokok = hargaPP[kd_barang];
                    console.log(harga_pokok);

                    $('#hrg_pp').val(harga_pokok);
                });

                $('#kd_barang').on('change', function(event) {
                    event.preventDefault();
                    /* Act on the event */
                    var kd_barang = $(this).val();
                    console.log(kd_barang );

                    var jumlah_stock = bnyk_stock[kd_barang];
                    console.log(jumlah_stock);

                    $('#banyak_stock').val(jumlah_stock);
                });

                $('#jumlah_beli').on('keyup', function(event) {
                    event.preventDefault();
                    /* Act on the event */
                    var jumlah_beli = $(this).val();
                    console.log(jumlah_beli );

                    var harga_barang = $('#hrg_jual').val();
                    var total = jumlah_beli * harga_barang;
                    console.log(total);

                    $('#total').val(total);
                });

                 $('#jumlah_beli').on('keyup', function(event) {
                    event.preventDefault();
                    /* Act on the event */
                    var jumlah_beli = $(this).val();
                    console.log(jumlah_beli );

                    var hpp = $('#hrg_pp').val();
                    var totalharga_pp = jumlah_beli * hpp;
                    console.log(totalharga_pp);

                    $('#total_hpp').val(totalharga_pp);
                });

                $('.delete').click(function(){
					var buyclose_id = $(this).attr('buyclose-id');
					swal({
					  title: "Yakin?",
					  text: "Mau di Hapus data Penjualan dengan id "+buyclose_id+ " ??",
					  icon: "warning",
					  buttons: true,
					  dangerMode: true,
					})
					.then((willDelete) => {
						console.log(willDelete);
					  if (willDelete) {
					   	window.location = "/sparepart/pelanggan/"+buyclose_id+"/buyclose";
					  } 
					});
				});
                
		   	});

  
		</script> <!-- Tampilkan Harga berdasarkan kode barang -->

@stop
