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
	    <li data-target="#myCarousel" data-slide-to="2"></li>
	  </ol>

	  <!-- Wrapper for slides -->
	  <div class="carousel-inner">
	    <div class="item active">
	      <img src="/images/ban1.jpg" alt="Chania" style="width: 100%; height: 200px ">
	      <div class="carousel-caption">
	        <h3>Los Angeles</h3>
	        <p>LA is always so much fun!</p>
	      </div>
	    </div>

	    <div class="item">
	      <img src="/images/ban2.jpg" alt="Chicago" style="width: 100%; height: 200px ">
	      <div class="carousel-caption">
	        <h3>Chicago</h3>
	        <p>Thank you, Chicago!</p>
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
	<br>
	<!-- Page container -->
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