@extends('layouts.layout')

@section('btback')
	<a href="/barang/{{ $tbBarang->kategori_id }}"><i class="icon-arrow-left8"></i> </a>
@endsection

@section('content')
	<h3>Konfirmasi Pesanan</h3>
	@if(Session::has('pesan'))
		<div class="alert alert-info">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			{{ Session::get('pesan') }} !
		</div>
	@endif

	<form action="/tambahtransaksi" method="POST" class="form-horizontal form-validate-jquery">
		{{ csrf_field() }}
		<input type="hidden" name="user_id" readonly="" value="{{ Auth::user()->id }}">
		<input type="hidden" name="barang_id" value="{{ $tbBarang->id }}" required="" readonly="">
		<div class="panel">
			<div class="panel-heading" style="border-bottom: 2px solid #f5f5f5">
				<h6 class="panel-title text-bold">Barang yang dibeli</h6>
			</div>
			
			<div class="panel-body">
				<div style="float: left; margin-top: -10px; margin-bottom: -50px">
					<div style="float: left; margin-right: 20px; width: 30%; border: 1px solid #fafafa; height: 70px">
		           		<img src="{{ url('uploads/file/'.$tbBarang->foto) }}" alt="Image not found" style="width: 100%; height: 100%;">
		           	</div>
					<h3>{{ $tbBarang->nm_barang }}</h3>
					<p>{{ $tbBarang->desk_barang }}</p>
				</div>
				<div style="float: right; margin-top: 45px">
				{{! $jum_str = preg_replace("/[^0-9]/", "", $tbBarang->harga) }}
		    	<h4><b>Rp. {{ number_format($jum_str,0 , "," , ".") }}</b></h4>
				</div>
			</div>
		</div>
		
		<div class="panel">
			<div class="panel-heading" style="border-bottom: 2px solid #f5f5f5">
				<h6 class="panel-title text-bold">Kirim ke</h6>
			</div>
			
			<div class="panel-body">
				<select name="kirim_k" data-placeholder="-Pilih Fakultas-" required="" class="select">
					<option></option>
					<option id="1" value="1">Fak. Sains dan Teknologi</option>
					<option id="2" value="2">Fak. Ushuludin</option>
					<option id="3" value="3">Fak. ISIP</option>
					<option id="4" value="4">Fak. Syariah dan Hukum</option>
					<option id="5" value="5">Fak. Psikologi</option>
				</select>
				<input type="hidden" readonly name="kirim_ke" id="almt" value="">
				<textarea class="form-control" name="det_kirim_ke" rows="3" required="" placeholder="Kemana pesanan mau dikirim..."></textarea>
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
						<td><input type="number" class="form-control-plaintext" id="satuan" value="{{ $tbBarang->harga }}" readonly></td>
					</tr>
					<tr>
						<td><b>Jumlah</b> <span style="float: right;">{{ $req->jumlah }}</span></td>
						<input type="hidden" name="jum_orderan" class="form-control-plaintext" id="jumlah" value="{{ $req->jumlah }}" readonly>
					</tr>
					<tr>
						<td><b>Ongkos Kirim</b> <span style="float: right;">Rp. </span></td>
						<td><input type="number" class="form-control-plaintext" id="ongkir" readonly></td>
					</tr>
				</table><hr>
				<table>
					<tr>
						<td width="140"><b>Total</b> <span style="float: right;">Rp. </span></td>
						<td><input type="number" class="form-control-plaintext" name="nominal" readonly id="total"></td>
					</tr>
				</table>
			</div>
		</div>
			
		<div>
			<button type="submit" style="width: 100%" class="btn btn-primary btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in">Konfirmasi</button>
		</div>
	</form>

	<script type="text/javascript">
		$(document).ready(function() {
		    $("select").change(function(){
		        if($(this).val() == "1") {
	                document.getElementById('ongkir').value = 0;
	                document.getElementById('almt').value = 'Fak. Sains dan Teknologi';
	            }else if ($(this).val() == "2") {
	            	document.getElementById('ongkir').value = 1000;
	                document.getElementById('almt').value = 'Fak. Ushuludin';
	            }else if ($(this).val() == "3"){
	            	document.getElementById('ongkir').value = 1500;
	                document.getElementById('almt').value = 'Fak. ISIP';
	            }else if ($(this).val() == "4"){
	            	document.getElementById('ongkir').value = 2000;
	                document.getElementById('almt').value = 'Fak. Syariah dan Hukum';
	            }else if ($(this).val() == "5"){
	            	document.getElementById('ongkir').value = 2500;
	                document.getElementById('almt').value = 'Fak. Psikologi';
	            }else{	
	            	document.getElementById('ongkir').value = 3000;
	                document.getElementById('almt').value = '';
	            }

	            $(document).ready(function() {
					var i = document.getElementById('satuan').value;
					var j = document.getElementById('jumlah').value;
					var k = document.getElementById('ongkir').value;
					var tots = i * j;
					var tot = parseInt(tots) + parseInt(k);
					document.getElementById('total').value = tot;
				});
		    });
		});
	</script>

@endsection