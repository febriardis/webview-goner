<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Kategori;
use App\Warung;

class BarangController extends Controller
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
	
	public function show($id) {
		$tabel = Barang::where('kategori_id', $id)->get();

		return view('show_barang')
		->with('tabel', $tabel);
	}

	public function viewTambah(){
		$tbWar = Warung::all();
		$tbKat = Kategori::all();
		
		return view('tambah_barang')
		->with('tbWar', $tbWar)
		->with('tbKat', $tbKat);
	}

	public function insert(Request $req){
		Barang::create($req->all());
		return redirect('/tambahkanbarang')
		->with('pesan', 'berhasil ditambahkan');
	}


	///////////////////////////////////
	public function showall(){
		$tb = Barang::all();
		return response()->json($tb);
	}
	public function find($id){
		return response()->json(Barang::find($id));
	}
	// public function insert(Request $req){
	// 	$tb = Barang::create($req->all());
	// 	return response()->json('Data Berhasil Disimpan', 200);
	// }
	public function update(Request $req, $id){
		$tb = Barang::findOrFail($id)->update($req->all());
		return response()->json('Data Berhasil Diupdate', 200);
	}
	public function delete($id){
		Barang::findOrFail($id)->delete();
		return response()->json('Data Berhasil Dihapus', 200);
	}
}