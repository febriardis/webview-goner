@extends('layouts.layout')

@section('btback')
	<a href="/home"><i class="icon-arrow-left8"></i> </a>
@endsection

@section('content')
	<!-- Basic datatable -->
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title text-bold"><i class="icon-cart5"></i> Riwayat Belanja</h5>
			<p>{{ Auth::user()->nama }}</p>
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
					<th width="120">Pesanan</th>
					<th>Nominal</th>
					<th class="text-center">Status</th>
				</tr>
			</thead>
			<tbody>
				@foreach($tbPes as $tb)
				<tr>
					<td>{{ (App\Barang::find($tb->barang_id)->nm_barang ) }}
						<p>{{ $tb->jum_orderan }} Pcs</p>
					</td>
					<td>{{ $tb->nominal }}</td>
					<td class=>
						@if($tb->status == 'sedang diproses')
							<span class="label label-info" style="float: left;">{{ $tb->status }}</span>
							<ul class="icons-list" style="float: right;">
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<i class="icon-menu9"></i>
									</a>
									<ul class="dropdown-menu dropdown-menu-right">
										<li><a href="/konfirmstatus/{{ $tb->id }}" style="color: #fff" class="btn btn-info btn-xs"> Edit Barang</a>
										</li>
										<li>
											<form action="/batalpesanan/{{ $tb->id }}" method="GET">
												<input type="hidden" name="idUser" value="{{ Auth::user()->id }}">
												<input type="submit" value="Cancel Pesanan" style="width: 100%" class="btn btn-danger btn-xs" >
											</form>
										</li>
									</ul>
								</li>
							</ul>
						@elseif($tb->status == 'pesanan dibatalkan')
							<span class="label label-danger">{{ $tb->status }}</span>
						@elseif($tb->status == 'selesai')
							<span class="label label-success">Pesanan Selesai</span>
						@endif
					</td>			
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<!-- /basic datatable -->
@endsection