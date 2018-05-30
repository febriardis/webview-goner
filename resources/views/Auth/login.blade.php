@extends('layouts.layout_login')

@section('content')
	<fieldset class="content-group">
		<legend class="text-bold" style="text-align: center;"><img src="images/icon-goner-blue.png" style="width: 40%;"></legend>
		@if(Session::has('pesan'))
			<div class="alert alert-danger">
  				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  				{{ Session::get('pesan') }} !
			</div>
		@endif
		@if(Session::has('pesanberhasil'))
			<div class="alert alert-info">
  				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  				{{ Session::get('pesanberhasil') }} !
			</div>
		@endif

		<div style="text-align: center; display: none;">
			<img src="/images/sending2.gif" width="50">
		</div>

		<form class="form-horizontal form-validate-jquery" action="/login" method="POST">
			{{ csrf_field() }}
			<div class="form-group">
				<label class="control-label col-lg-2">Email</label>
				<div class="col-lg-10">
					<div class="input-group">
						<span class="input-group-addon"><i class="icon-user"></i></span>
						<input type="email" name="email" class="form-control" required="required" placeholder="mymail@mail.xx">
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-lg-2">Password</label>
				<div class="col-lg-10">
					<div class="input-group">
						<span class="input-group-addon"><i class="icon-lock2"></i></span>
						<input type="password" name="password" class="form-control" required="required" placeholder="">
					</div>
				</div>
			</div>
			<div class="text-right">
				<button type="submit" style="width: 100%" class="btn btn-primary btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in">Masuk</button>
				<a href="{{ url('/register') }}" style="width: 100%; margin-top: 5px" class="btn btn-primary btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"> Daftar </a>
			</div>
		</form>
	</fieldset>
@endsection