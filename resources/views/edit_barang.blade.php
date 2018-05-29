@extends('layouts.layout')

@section('btback')
	<a href="/home"><i class="icon-arrow-left8"></i> </a>
@endsection

@section('content')
<div style="width: 80%; margin: 0px auto">
	{{! $cekWr = (App\Warung::where('user_id', Auth::user()->id))->first() }}
	<h3>Form Edit Barang Jualan {{ $cekWr->nm_warung }}</h3>
	@if(Session::has('pesan'))
		<div class="alert alert-info">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			{{ Session::get('pesan') }} !
		</div>
	@endif
	<form action="/updatebarang/{{ $tbBar->id }}" method="POST" enctype="multipart/form-data" class="form-horizontal form-validate-jquery">
		{{ csrf_field() }}
		<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
		<input type="hidden" name="warung_id" value="{{ $cekWr->id }}">
		
		<div class="form-group">
			<label class="control-label col-lg-2">Kategori</label>
			<div class="col-lg-10">
				<select data-placeholder="Pilih Kategori" name="kategori_id" class="select">
					<option>{{ $tbBar->kategori_id }}</option>
					@foreach($tbKat as $tb)
					<option value="{{ $tb->id }}">{{ $tb->nm_kategori }}</option>
					@endforeach
				</select>
			</div>
		</div>
		
		<div class="form-group">
			<label class="control-label col-lg-2">Nama Barang</label>
			<div class="col-lg-10">
				<input type="text" class="form-control" name="nm_barang" value="{{ $tbBar->nm_barang }}" required="" placeholder="">
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-lg-2">Gambar Barang:</label>
			<div class="col-lg-10">
				<input type="file" name="foto" class="file-styled" required="">
				<span class="help-block">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-lg-2">Deskripsi Barang</label>
			<div class="col-lg-10">
				<textarea class="form-control" name="desk_barang" rows="3">{{ $tbBar->desk_barang }}</textarea>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-2">Harga</label>
			<div class="col-lg-10">
				<div class="input-group">
					<span class="input-group-addon"><b>Rp</b></span>
					<input type="number" class="form-control" name="harga" value="{{ $tbBar->harga }}">
				</div>
			</div>
		</div>
		<div class="text-right">
			<button type="submit" class="btn btn-primary">Simpan</button>
		</div>
	</form>
</div>
@endsection