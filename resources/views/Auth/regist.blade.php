@extends('layouts.layout_login')

@section('content')
	<fieldset class="content-group">
		<legend class="text-bold" style="text-align: center;">Daftar&nbsp;<img src="images/icon-goner-blue.png" style="width: 40%;"></legend>
		
		@if(Session::has('pesan'))
			<div class="alert alert-danger">
  				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  				{{ Session::get('pesan') }} !
			</div>
		@endif

		<form class="form-horizontal form-validate-jquery" action="/register" method="POST">
			{{ csrf_field() }}
			<div class="form-group">
				<label class="control-label col-lg-2">Nama</label>
				<div class="col-lg-10">
					<div class="input-group">
						<span class="input-group-addon"><i class="icon-user"></i></span>
						<input type="text" name="nama" class="form-control" placeholder="" required="">
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-lg-2">Email</label>
				<div class="col-lg-10">
					<div class="input-group">
						<span class="input-group-addon"><i class="icon-user"></i></span>
						<input type="email" name="email" class="form-control" placeholder="mymail@mail.xx">
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-lg-2">No Hp</label>
				<div class="col-lg-10">
					<div class="input-group">
						<span class="input-group-addon"><i class="icon-user"></i></span>
						<input type="number" name="no_hp" class="form-control" placeholder="" required="">
					</div>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-lg-2">Alamat</label>
				<div class="col-lg-10">
						<textarea class="form-control" name="alamat" rows="4"></textarea>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-lg-2">Password</label>
				<div class="col-lg-10">
					<div class="input-group">
						<span class="input-group-addon"><i class="icon-lock2"></i></span>
						<input type="password" name="password" class="form-control" placeholder="">
					</div>
				</div>
			</div>
			<div>
				<button type="submit" style="width: 100%" class="btn btn-primary">Daftar</button>
				<a href="{{ url('/') }}" style="width: 100%; margin-top: 5px" class="btn btn-primary">Batal </a>
			</div>
		</form>
	</fieldset>
@endsection