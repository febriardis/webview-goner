@extends('layouts.layout')

@section('btback')
	<a href="/home"><i class="icon-arrow-left8"></i> </a>
@endsection

@section('content')
	<!-- Page container -->
	<div style="text-align: center;"><img src="/images/icon-goner-blue.png" style="width: 60%;"></div>
	<h3>Kategori Menu</h3>
	<hr>
		@foreach($tbl as $tb)
		<a href="/barang/{{ $tb->id }}">
			<div class="col-sm-4 col-lg-2">
				<div class="panel">
					<div style="display: none;">
					{{ $getGm = (App\Barang::where('kategori_id', $tb->id)->inRandomOrder()->limit(1)->first()) }}</div>
			    	@if(!$getGm)
		           		<img src="/assets/images/placeholder.jpg" style="width: 100%; height: 150px" alt="">
		           	@else
		           		<img src="{{ url('uploads/file/'.$getGm->foto) }}" style="width: 100%; height: 150px" alt="">
		       		@endif
					<div class="p-15">
						<div class="media-body">
							<strong>{{ $tb->nm_kategori }}</strong>
						</div>
					</div>
				</div>
			</div>
		</a>
		@endforeach
	<!-- /page container -->
@endsection