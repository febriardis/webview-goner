<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;

class KategoriController extends Controller
{    
	public function showall(){
		$tabel = Kategori::all();
		return view('show_home') //response()->json(Kategori::all());
		->with('tbl', $tabel);
	}
	
	public function viewTambah(){
		$tabel = Kategori::all();
		return view('show_home') //response()->json(Kategori::all());
		->with('tbl', $tabel);
	}


	//==========================================

	public function find($id){
		return response()->json(Kategori::find($id));
	}
	public function insert(Request $req){
		Kategori::create($req->all());
		return response()->json('Data Berhasil Disimpan', 200);
	}
	public function update(Request $req, $id){
		$tb = Kategori::findOrFail($id)->update($req->all());
		return response()->json('Data Berhasil Diupdate', 200);
	}
	public function delete($id){
		Kategori::findOrFail($id)->delete();
		return response()->json('Data Berhasil Dihapus', 200);
	}
}