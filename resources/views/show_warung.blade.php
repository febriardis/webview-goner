@extends('layouts.layout')

@section('btback')
	<a href="/home"><i class="icon-arrow-left8"></i> </a>
@endsection

@section('content')
	<!-- Page container -->
		@foreach($tabel as $tb)
		<a href="/barangwarung/{{ $tb->id }}">
			<div class="col-sm-4 col-lg-2">
				<div class="panel">
					<img src="assets/images/placeholder.jpg" style="width: 100%; max-height: 150px" alt="">
					<div class="p-15">
						<div class="media-body">
							<strong>{{ $tb->nm_warung }}</strong>
							<p>CP Warung {{ $tb->hp_warung }}</p>
						</div>
					</div>
				</div>
			</div>
		</a>
		@endforeach
	<!-- /page container -->
@endsection