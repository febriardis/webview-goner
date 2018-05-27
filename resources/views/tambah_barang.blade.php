@extends('layouts.layout')

@section('content')
<div style="width: 80%; margin: 0px auto">
	<h3>Form Tambah Barang Jualan</h3>
	@if(Session::has('pesan'))
		<div class="alert alert-info">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			{{ Session::get('pesan') }} !
		</div>
	@endif
	<form action="/tambahbarang" method="POST" class="form-horizontal form-validate-jquery">
		{{ csrf_field() }}
		{{ (App\Warung::find(1))->nm_warung }}
		<input type="hidden" name="warung_id" value="">
		<div>
			<label>Kategori</label><br>
			<select data-placeholder="Pilih Kategori" name="kategori_id" class="select">
				<option></option>
				@foreach($tbKat as $tb)
				<option value="{{ $tb->id }}">{{ $tb->id }}-{{ $tb->nm_kategori }}</option>
				@endforeach
			</select>
		</div>
		
		<div class="form-group">
			<label class="control-label col-lg-2">Nama Barang</label>
			<div class="col-lg-10">
				<input type="text" class="form-control" name="nm_barang" placeholder="">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-2">Deskripsi Barang</label>
			<div class="col-lg-10">
				<textarea class="form-control" name="desk_barang" rows="3"></textarea>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-2">Harga</label>
			<div class="col-lg-10">
				<div class="input-group">
					<span class="input-group-addon"><b>Rp</b></span>
					<input type="number" class="form-control" name="harga">
				</div>
			</div>
		</div>
		<div class="text-right">
			<button type="submit" class="btn btn-primary">Simpan</button>
		</div>
	</form>
</div>
@endse