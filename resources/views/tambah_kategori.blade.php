@extends('layouts.layout')

@section('content')
<div style="width: 80%; margin: 0px auto">
	<h3>Form Pendaftaran Warung</h3>
	@if(Session::has('pesan'))
		<div class="alert alert-info">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			{{ Session::get('pesan') }} !
		</div>
	@endif

	<form action="/tambahkategori" method="POST" class="form-horizontal form-validate-jquery">
		{{ csrf_field() }}
		<div class="form-group">
			<label class="control-label col-lg-2">Nama Kategori</label>
			<div class="col-lg-10">
				<input type="text" class="form-control" name="nm_kategori" placeholder="" required="">
			</div>
		</div>
		<div class="text-right">
			<button type="submit" class="btn btn-primary">Simpan</button>
		</div>
	</form>
</div>
@endsection