@extends('layouts.layout')

@section('btback')
	<a href="/home"><i class="icon-arrow-left8"></i> </a>
@endsection

@section('content')
<div style="width: 80%; margin: 0px auto">
	<h3>Form Pendaftaran Warung</h3>
	@if(Session::has('pesan'))
		<div class="alert alert-info">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			{{ Session::get('pesan') }} !
		</div>
	@endif

	<form action="/tambahwarung" method="POST" enctype="multipart/form-data" class="form-horizontal form-validate-jquery" >
		{{ csrf_field() }}
		<div style="display: none;">
			<input type="text" name="user_id" readonly value="{{ Auth::user()->id }}">
		</div>
		<div class="form-group">
			<label class="control-label col-lg-2">Nama Warung</label>
			<div class="col-lg-10">
				<input type="text" class="form-control" name="nm_warung" required="" placeholder="nama barang">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-2">Gambar Warung:</label>
			<div class="col-lg-10">
				<input type="file" name="foto" class="file-styled" required="">
				<span class="help-block">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-2">Contact Warung</label>
			<div class="col-lg-10">
				<input type="text" class="form-control" name="hp_warung" required="" placeholder="nama barang">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-2">Alamat Warung</label>
			<div class="col-lg-10">
				<textarea name="almt_warung" class="form-control" required="" rows="3"></textarea>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-2">Deskripsi Warung</label>
			<div class="col-lg-10">
				<textarea name="deskripsi" class="form-control" required="" rows="3"></textarea>
			</div>
		</div>
		<div class="text-right">
			<button type="submit" class="btn btn-primary">Simpan</button>
		</div>
	</form>
</div>
@endsection