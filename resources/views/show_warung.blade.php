@extends('layouts.layout')

@section('btback')
	<a href="/home"><i class="icon-arrow-left8"></i> </a>
@endsection

@section('content')
	<!-- Page container -->
	<div style="text-align: center;"><img src="/images/icon-goner-blue.png" style="width: 60%;"></div>
	<h3>Warung</h3>
	<hr>
		@foreach($tabel as $tb)
		<a href="/barangwarung/{{ $tb->id }}">
			<div class="col-sm-4 col-lg-2">
				<div class="panel">
			    	@if($tb->foto == 0)
		           		<img src="/assets/images/placeholder.jpg" style="width: 100%; max-height: 150px" alt="">
		           	@else
		           		<img src="{{ url('uploads/file/'.$tb->foto) }}" style="width: 100%; max-height: 150px" alt="">
		       		@endif
					<div class="p-15">
						<div class="media-body">
							<strong>{{ $tb->nm_warung }}</strong>
						</div>
					</div>
				</div>
			</div>
		</a>
		@endforeach
	<!-- /page container -->
@endsection