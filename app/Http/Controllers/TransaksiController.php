<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;

class TransaksiController extends Controller
{    
	/**
    * Create a new controller instance.
    *
    * @return void
    */
    
    public function __construct()
    {
        //
    }
	
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