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
			{{! $tbBar = (App\Barang::find($cekdetail->barang_id))->first() }}
			<div class="panel-body">
				<div style="float: left; margin-top: -10px; margin-bottom: -50px">
					<img src="{{ url('uploads/file/'.$tbBar->foto) }}" style="float: left; margin-right: 20px; width: 30%; height: 70px" alt="">
					<h3>{{ $tbBar->nm_barang }}</h3>
					<p>{{ $tbBar->desk_barang }}</p>
				</div>
				<div style="float: right; margin-top: 45px">
				{{! $jum_str = preg_replace("/[^0-9]/", "", $tbBar->harga) }}
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