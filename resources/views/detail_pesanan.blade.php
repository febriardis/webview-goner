@extends('layouts.layout')

@section('btback')
	<a href=""><i class="icon-arrow-left8"></i> </a>
@endsection

@section('content')
	<h3>Konfirmasi Pesanan</h3>
	@if(Session::has('pesan'))
		<div class="alert alert-info">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			{{ Session::get('pesan') }} !
		</div>
	@endif
	{{ (App\Transaksi::where('user_id', Auth::user()->id)->get()) }}
		<div class="panel">
			<div class="panel-heading" style="border-bottom: 2px solid #f5f5f5">
				<h6 class="panel-title text-bold">Barang yang dibeli</h6>
			</div>
			
			<div class="panel-body">
				<div style="float: left; margin-top: -10px; margin-bottom: -50px">
					<img src="" style="float: left; margin-right: 20px; width: 30%; height: 70px" alt="">
					<h3>Nama Barang</h3>
					<p>Deskripsi</p>
				</div>
				<div style="float: right; margin-top: 45px">
				{{! $jum_str = preg_replace("/[^0-9]/", "", 10000) }}
		    	<h4><b>Rp. {{ number_format($jum_str,0 , "," , ".") }}</b></h4>
				</div>
			</div>
		</div>
		
		<div class="panel">
			<div class="panel-heading" style="border-bottom: 2px solid #f5f5f5">
				<h6 class="panel-title text-bold">Detail Pembayaran</h6>
			</div>
			
			<div class="panel-body">
				<table>
					<tr>
						<td width="140"><b>Harga satuan</b> <span style="float: right;">Rp. </span></td>
						<td><input type="number" class="form-control-plaintext" id="satuan" value="" readonly></td>
					</tr>
					<tr>
						<td><b>Jumlah</b> <span style="float: right;"> 4 </span></td>
						<input type="hidden" name="jum_orderan" class="form-control-plaintext" id="jumlah" value="" readonly>
					</tr>
					<tr>
						<td><b>Ongkos Kirim</b> <span style="float: right;">Rp. </span></td>
						<td><input type="number" name="nominal" class="form-control-plaintext" id="ongkir" readonly></td>
					</tr>
				</table><hr>
				<table>
					<tr>
						<td width="140"><b>Total</b> <span style="float: right;">Rp. </span></td>
						<td><input type="number" class="form-control-plaintext" readonly id="total"></td>
					</tr>
				</table>
			</div>
		</div>
		<div class="panel">
			<div class="panel-body">
				<p>Pesanan sedang dikirim, akan segera tiba.</p>
			</div>
		</div>
@endsection