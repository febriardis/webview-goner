@extends('layouts.layout')

@section('btback')
	<a href="/warung"><i class="icon-arrow-left8"></i> </a>
@endsection

@section('content')
	<div style="text-align: center;"><img src="/images/icon-goner-blue.png" style="width: 60%;"></div>
	<hr>
		<div class="panel">
			@if($tbWarung->foto == 0)
				<div style="width: 100%; border: 1px solid #fafafa; height: 150px">
		       		<img src="/assets/images/placeholder.jpg" alt="Image not found" style="width: 100%; height: 100%;">
		       	</div>
        	@else
        		<div style="width: 100%; border: 1px solid #fafafa; height: 150px">
		       		<img src="{{ url('uploads/file/'.$tbWarung->foto) }}" alt="Image not found" style="width: 100%; height: 100%;">
		       	</div>
       		@endif
       		<div class="p-15">
				<div class="media-body">
					<div style="float: left;">
						<strong>{{ $tbWarung->nm_warung }}</strong>
						<p><i class="icon-pin"></i> {{ $tbWarung->almt_warung }}</p>
					</div>
					<div style="float: right;">
						<p><b>Cp</b> : {{ $tbWarung->hp_warung }}</p>
					</div>
				</div>
			</div>
		</div>
		
		@foreach($tabel as $tb)
			<div style="width: 160px; float: left; margin:0px">
				<div class="panel">
					<div style="width: 100%; border: 1px solid #fafafa; height: 100px">
		           		<img src="{{ url('uploads/file/'.$tb->foto) }}" alt="Image not found" style="width: 100%; height: 100%;">
		           	</div>
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