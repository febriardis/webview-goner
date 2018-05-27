@extends('layouts.layout')

@section('btback')
	<a href="/home"><i class="icon-arrow-left8"></i> </a>
@endsection

@section('content')
	<!-- Page container -->
		@foreach($tabel as $tb)
		<a href="">
			<div style="width: 160px; float: left; margin:10px">
				<div class="panel">
					<img src="/assets/images/placeholder.jpg" style="width: 100%; max-height: 120px" alt="">
					<div class="p-15">
						<div class="media-body">
							<strong>{{ $tb->nm_barang }}</strong>
							<p>{{ $tb->harga }}</p>
						</div>
					</div>
				</div>
			</div>
		</a>
		@endforeach
@endsection