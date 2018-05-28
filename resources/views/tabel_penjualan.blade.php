@extends('layouts.layout')

@section('btBack')

@endsection

@section('content')
	{{! $tbBarang = (App\Barang::where('warung_id', $cekWr->id))->get() }}

	<!-- Basic datatable -->
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title text-bold">Data Penjualan</h5>
		</div>
		@if(Session::has('pesan'))
			<div class="alert alert-info">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				{{ Session::get('pesan') }} !
			</div>
		@endif
		<table class="table datatable-basic">
			<thead>
				<tr>
					<th>Nama Barang</th>
					<th>Harga</th>
					<th class="text-center">Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach($tbBarang as $tb)
				<tr>
					<td>{{ $tb->nm_barang }}</td>
					<td>{{ $tb->harga}}</td>
					<td class="text-center">
						<ul class="icons-list">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="icon-menu9"></i>
								</a>
								<ul class="dropdown-menu dropdown-menu-right">
									<li><a href="/editbarang/{{ $tb->id }}" style="color: #fff" class="btn btn-info btn-xs">Edit Barang</a></li>
									<li>
										<form action="/hapusbarang/{{ $tb->id }}" method="GET">
											<input type="hidden" name="user_id" readonly value="{{ Auth::user()->id }}">
											<button type="submit" style="width: 100%" class="btn btn-danger btn-xs"> Hapus Barang</button>
										</form>
									</li>
								</ul>
							</li>
						</ul>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<!-- /basic datatable -->
@endsection