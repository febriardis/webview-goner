@extends('layouts.layout')

@section('btBack')

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
					<td class="text-center">
						@if($tb->status == 'sedang diproses')
							<span class="label label-info" style="margin-bottom: 5px">{{ $tb->status }}</span>
							<a href="/konfirmstatus/{{ $tb->id }}" class="btn-primary btn-xs"><i class="glyphicon glyphicon-ok-circle"></i> Confirm</a>
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