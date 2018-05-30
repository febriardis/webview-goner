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
			    	@if(!$tb->foto)
			    		<div style="width: 100%; border: 1px solid #fafafa; height: 150px">
		       				<img src="/assets/images/placeholder.jpg" alt="Image not found" style="width: 100%; height: 100%;">
		       			</div>
		           	@else
		       			<div style="width: 100%; border: 1px solid #fafafa; height: 150px">
		       				<img src="{{ url('uploads/file/'.$tb->foto) }}" alt="Image not found" style="width: 100%; height: 100%;">
		       			</div>
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