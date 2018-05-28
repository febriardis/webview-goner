<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\Barang;

class TransaksiController extends Controller
{    
	public function formTrans(Request $req, $id){
		$tb = Barang::find($id);
		return view('form_transaksi')
		->with('tbBarang', $tb)
		->with('req', $req);
	}

	public function simpanTrans(Request $req){
		Transaksi::create($req->all());
	}

	//=============================================
	public function showall(){
		return response()->json(Transaksi::all());
	}
	public function find($id){
		return response()->json(Transaksi::find($id));
	}
	public function insert(Request $req){
		Transaksi::create($req->all());
		return response()->json('Data Berhasil Disimpan', 200);
	}
	public function update(Request $req, $id){
		$tb = Transaksi::findOrFail($id)->update($req->all());
		return response()->json('Data Berhasil Diupdate', 200);
	}
	public function delete($id){
		Transaksi::findOrFail($id)->delete();
		return response()->json('Data Berhasil Dihapus', 200);
	}
}