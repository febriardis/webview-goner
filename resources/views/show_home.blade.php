@extends('layouts.layout')

@section('btback')

@endsection

@section('content')
	<!-- Page container -->
	<div style="text-align: center;"><img src="/images/icon-goner-blue.png" style="width: 60%;"></div>
		@foreach($tbl as $tb)
		<a href="/barang/{{ $tb->id }}">
			<div class="col-sm-4 col-lg-2">
				<div class="panel">
					<img src="assets/images/placeholder.jpg" style="width: 100%; max-height: 150px" alt="">
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