@extends('layouts.layout')

@section('btback')
	<a href="/home"><i class="icon-arrow-left8"></i></a>
@endsection

@section('content')
	<!-- Basic datatable -->
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title text-bold">List Pembeli {{ $cekWar->nm_warung }}</h5>
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
					<th>Pembeli</th>
					<th>Detail Barang</th>
					<th class="text-center">Status</th>
				</tr>
			</thead>
			<tbody>
				{{! $cekBar = (App\Barang::where('warung_id', $cekWar->id)->get()) }}<br>
				@foreach($cekBar as $cek)
					{{! $ce = (App\Transaksi::where('barang_id', $cek->id)->get()) }}
					@foreach($ce as $c)
						<tr>
							<td>{{ (App\User::find($c->user_id)->nama) }}</td>
							<td>{{ (App\Barang::find($c->barang_id)->nm_barang) }}
								<p>{{ $c->jum_orderan }} Pcs</p>
								<p><b>Biaya</b> Rp.{{ $c->nominal }}</p>
								<p><b>Kirim ke</b> {{ $c->kirim_ke }}, {{ $c->det_kirim_ke }}</p>
							</td>
							<td class="text-center" width="170">
								@if($c->status == 'sedang diproses')
									<span class="label label-info" style="margin-bottom: 5px">{{ $c->status }}</span>
									<form action="/cancelpesanan/{{ $c->id }}" method="GET">
										<input type="hidden" name="idPenjual" value="{{ Auth::user()->id }}">
										<input type="submit" value="Cancel Pesanan" class="btn-danger btn-xs">
									</form>
								@elseif($c->status == 'pesanan dibatalkan')
									<span class="label label-danger">Dibatalkan</span>
								@elseif($c->status == 'selesai')
									<span class="label label-success">Telah Diterima</span>
								@endif
							</td>
						</tr>
					@endforeach
				@endforeach	
			</tbody>
		</table>
	</div>
	<!-- /basic datatable -->
@endsection