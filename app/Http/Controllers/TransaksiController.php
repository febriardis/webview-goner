<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\Barang;
use App\Warung;

class TransaksiController extends Controller
{    
	public function formTrans(Request $req, $id){
		$tb = Barang::find($id);
		return view('form_transaksi')
		->with('tbBarang', $tb)
		->with('req', $req);
	}

	public function simpanTrans(Request $req){
		$tb = new Transaksi;
		$tb->user_id 	 = $req->user_id;
		$tb->barang_id   = $req->barang_id;
		$tb->kirim_ke    = $req->kirim_ke;
		$tb->det_kirim_ke= $req->det_kirim_ke;
		$tb->jum_orderan = $req->jum_orderan;
		$tb->nominal	 = $req->nominal;
		$tb->status 	 = 'sedang diproses';
		$tb->save();

		//return redirect('/detail pesanan') //response()->json($tb);
		//->with('cekdetail', $tb);
		return redirect()->action('TransaksiController@detail', ['idTrans' => $tb]);
	}

	public function detail($idTrans){
		$tb = Transaksi::find($idTrans);

		return view('detail_pesanan')
		->with('cekdetail', $tb);
		//->with('cekdetail', $idTrans);
	}

//-------------------------------------------------------------------------
	public function showPesanan($userId) {
		$cekPesanan = Transaksi::where('user_id', $userId)->get();

		return view('tabel_pesanan')
		->with('tbPes', $cekPesanan);
	}

	public function konfStatus($id){
		$tb = Transaksi::find($id);
		$tb->status = 'selesai';
		$tb->save();

		return redirect()->action('TransaksiController@showPesanan', ['user_id' => $tb->user_id]);
	}

	public function batalPesanan(Request $req, $id) {
		$tb = Transaksi::find($id);
		$tb->status = 'pesanan dibatalkan';
		$tb->save();

		return redirect()->action('TransaksiController@showPesanan', ['user_id' => $req->idUser]);
	}
//-------------------------------------------------------------------------
	public function showTabelPembeli($userId) {
		$cekWar = Warung::where('user_id', $userId)->first();

		return view('tabel_pembeli')
		->with('cekWar', $cekWar);
	}
	public function cancPesanan(Request $req, $id) {
		$tb = Transaksi::find($id);
		$tb->status = 'pesanan dibatalkan';
		$tb->save();

		return redirect()->action('TransaksiController@showTabelPembeli', ['user_id' => $req->idPenjual ]); //XXX id Penjual
	}

	//=============================================
	// public function showall(){
	// 	return response()->json(Transaksi::all());
	// }
	// public function find($id){
	// 	return response()->json(Transaksi::find($id));
	// }
	// public function insert(Request $req){
	// 	Transaksi::create($req->all());
	// 	return response()->json('Data Berhasil Disimpan', 200);
	// }
	// public function update(Request $req, $id){
	// 	$tb = Transaksi::findOrFail($id)->update($req->all());
	// 	return response()->json('Data Berhasil Diupdate', 200);
	// }
	// public function delete($id){
	// 	Transaksi::findOrFail($id)->delete();
	// 	return response()->json('Data Berhasil Dihapus', 200);
	// }
}