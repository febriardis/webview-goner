@extends('layouts.layout')

@section('btback')
	<a href="/home"><i class="icon-arrow-left8"></i> </a>
@endsection

@section('content')
	<h3>Konfirmasi Pesanan</h3>
	@if(Session::has('pesan'))
		<div class="alert alert-info">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			{{ Session::get('pesan') }} !
		</div>
	@endif
	{{! $cekdetail }}
		<div class="panel">
			<div class="panel-body">
				<p>Pesanan telah dikonfirmasi dan akan segera dikirim.</p>
			</div>
		</div>
		<div class="panel">
			<div class="panel-heading" style="border-bottom: 2px solid #f5f5f5">
				<h6 class="panel-title text-bold">Barang yang dibeli</h6>
			</div>
			{{! $cekFot = (App\Barang::find($cekdetail->barang_id))->foto }}
			{{! $cekNm = (App\Barang::find($cekdetail->barang_id))->nm_barang }}
			{{! $cekBar = (App\Barang::find($cekdetail->barang_id))->desk_barang }}
			{{! $cekHarga = (App\Barang::find($cekdetail->barang_id))->harga }}
			<div class="panel-body">
				<div style="float: left; margin-top: -10px; margin-bottom: -50px">
					
					<div style="float: left; margin-right: 20px; width: 30%; border: 1px solid #fafafa; height: 70px">
		           		<img src="{{ url('uploads/file/'.$cekFot) }}" alt="Image not found" style="width: 100%; height: 100%;">
		           	</div>

					<h3>{{ $cekNm}}</h3>
					<p>{{ $cekBar }}</p>
				</div>
				<div style="float: right; margin-top: 45px">
				{{! $jum_str = preg_replace("/[^0-9]/", "", $cekHarga) }}
		    	<h4><b>Rp. {{ number_format($jum_str,0 , "," , ".") }}</b></h4>
				</div>
			</div>
		</div>

		<div class="panel">
			<div class="panel-body">
				<h6 class="panel-title text-bold">Kirim ke</h6>
				<p>{{ $cekdetail->kirim_ke }}, {{ $cekdetail->det_kirim_ke }}</p>
			</div>
		</div>

		<div class="panel">
			<div class="panel-heading" style="border-bottom: 2px solid #f5f5f5">
				<h6 class="panel-title text-bold">Detail Pembayaran</h6>
			</div>
			
			<div class="panel-body">
				{{! $nom_str = preg_replace("/[^0-9]/", "", $cekdetail->nominal) }}
				<h4>Biaya pesanan, <b>Rp. {{number_format($nom_str,0 , "," , ".") }}</b></h4>
				<p>Siapkan uang yang pas.</p>
			</div>
		</div>
@endsection