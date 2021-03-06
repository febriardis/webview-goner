@extends('layouts.layout')

@section('btback')

@endsection

@section('content')
	<!--head-->
	<div style="text-align: center;"><img src="/images/icon-goner-blue.png" style="width: 50%;"></div>
	<!--end head-->
	<div id="myCarousel" class="carousel slide" style="margin: 20px 0px" data-ride="carousel">
	  <!-- Indicators -->
	  <ol class="carousel-indicators">
	    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
	    <li data-target="#myCarousel" data-slide-to="1"></li>
	  </ol>

	  <!-- Wrapper for slides -->
	  <div class="carousel-inner">
	    <div class="item active">
	    	@if(!$gmbr)
           		<img src="/images/ban1.jpg" style="width: 100%; height: 200px" alt="">
           	@else
           		<img src="{{ url('uploads/file/'.$gmbr->foto) }}" alt="Images not found" style="width: 100%; height: 200px" alt="">
       		@endif
	      	<div class="carousel-caption">
	      		<div style="background: #fafafa;color: #000"><h5>Pesan disini sekarang!</h5></div>
	    	</div>
	    </div>

	    <div class="item">
	      	<img src="/images/ban2.jpg" style="width: 100%; height: 200px" alt="">
	      	<div class="carousel-caption">
	        	<div style="background: #fafafa;color: #000"><h5>Terimakasih telah berkunjung!</h5></div>
	      	</div>
	    </div>

	  <!-- Left and right controls -->
	  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
	    <span class="glyphicon glyphicon-chevron-left"></span>
	    <span class="sr-only">Previous</span>
	  </a>
	  <a class="right carousel-control" href="#myCarousel" data-slide="next">
	    <span class="glyphicon glyphicon-chevron-right"></span>
	    <span class="sr-only">Next</span>
	  </a>
	</div>
	<hr>
	<!-- Page container -->
		@foreach($tbkat as $tb)
		<a href="/barang/{{ $tb->id }}">
			<div class="col-sm-4 col-lg-2">
				<div class="panel">
					<div style="display: none;">
					{{ $getGm = (App\Barang::where('kategori_id', $tb->id)->inRandomOrder()->limit(1)->first()) }}</div>
			    	
			    	@if(!$getGm)
			    	<div style="width: 100%; border: 1px solid #fafafa; height: 150px">
		           		<img src="/assets/images/placeholder.jpg" alt="Image not found" style="width: 100%; height: 100%;" alt="">
		           	</div>
		           	@else
			    	<div style="width: 100%; border: 1px solid #fafafa; height: 150px">
		           		<img src="{{ url('uploads/file/'.$getGm->foto) }}" alt="Image not found" style="width: 100%; height: 150px; border: 1px solid #fafafa;" alt="">
		           	</div>
		       		@endif

					<div class="p-15" style="border-top: 4px solid #fafafa">
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