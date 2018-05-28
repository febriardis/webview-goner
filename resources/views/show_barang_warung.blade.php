@extends('layouts.layout')

@section('btback')
	<a href="/home"><i class="icon-arrow-left8"></i> </a>
@endsection

@section('content')
	<legend class="text-bold"><h4>Menu Warung</h4></legend>
	<!-- Page container -->
		@foreach($tabel as $tb)
			<div style="width: 160px; float: left; margin:0px">
				<div class="panel">
					<img src="/assets/images/placeholder.jpg" style="width: 100%; max-height: 120px" alt="">
					<div class="p-15">
						<div class="media-body">
							<strong>{{ $tb->nm_barang }}</strong>
							<!--<p>{{ $tb->desk_barang }}</p>-->
							<p>Rp. {{ $tb->harga }}</p>
							<form action="/formtransaksi/{{ $tb->id }}" method="GET">
								<input type="number" name="jumlah" class="form-group" value="1" style="width: 28%;">
								<button type="submit" class="btn text-left btn-info btn-labeled btn-xs"><b><i class="icon-cart-add2"></i></b>Beli</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		@endforeach
@endsection