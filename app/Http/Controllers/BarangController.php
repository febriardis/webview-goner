<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Kategori;
use App\Warung;

class BarangController extends Controller
{    	
	public function show($id) {
		$tabel = Barang::where('kategori_id', $id)->get();

		return view('show_barang')
		->with('tabel', $tabel);
	}

	public function showBarangWarung($warungId) {
		$tabel = Barang::where('warung_id', $warungId)->get();
		$tbWar = Warung::find($warungId);

		return view('show_barang_warung')
		->with('tbWarung', $tbWar)
		->with('tabel', $tabel);
	}
//-------------------------------------------------------------------------
	public function showTabelBarangWarung($userId) {
		$cekWarung = Warung::where('user_id', $userId)->first();

		return view('tabel_penjualan')
		->with('cekWr', $cekWarung);
	}
//-------------------------------------------------------------------------
	public function viewTambah(){
		$tbWar = Warung::all();
		$tbKat = Kategori::all();
		
		return view('tambah_barang')
		->with('tbWar', $tbWar)
		->with('tbKat', $tbKat);
	}

	public function insert(Request $req){
		//Barang::create($req->all());
		$tb = new Barang;
		$tb->warung_id = $req->warung_id;
		$tb->kategori_id = $req->kategori_id;
		$tb->nm_barang   = $req->nm_barang;

		$file = $req->file('foto');
        $ext  = $file->getClientOriginalExtension();
        $newName = rand(100000,1001238912).".".$ext;
        $file->move('uploads/file',$newName);
		
		$tb->foto 		 = $newName;
		$tb->desk_barang = $req->desk_barang;
		$tb->harga       = $req->harga;
		$tb->save();

		return redirect('/tambahkanbarang')
		->with('pesan', 'berhasil ditambahkan');
	}
//-------------------------------------------------------------------------
	public function viewEdit($id){
		$tbBar = Barang::find($id);
		$tbWar = Warung::all();
		$tbKat = Kategori::all();
		
		return view('edit_barang')
		->with('tbBar', $tbBar)
		->with('tbWar', $tbWar)
		->with('tbKat', $tbKat);
	}

	public function update(Request $req, $id){
		//Barang::create($req->all());
		$tb = Barang::find($id);
		$tb->warung_id = $req->warung_id;
		$tb->kategori_id = $req->kategori_id;
		$tb->nm_barang   = $req->nm_barang;

	if ($req->foto==null) {
		$tb->desk_barang = $req->desk_barang;
		$tb->harga       = $req->harga;
		$tb->save();
	}
	else{
		$file = $req->file('foto');
        $ext  = $file->getClientOriginalExtension();
        $newName = rand(100000,1001238912).".".$ext;
        $file->move('uploads/file',$newName);
		
		$tb->foto 		 = $newName;
		$tb->desk_barang = $req->desk_barang;
		$tb->harga       = $req->harga;
		$tb->save();
	}
		return redirect()->action('BarangController@showTabelBarangWarung', ['idUser' => $req->user_id])
		->with('pesan', 'Barang Berhasil Diupdate');
	}
//-------------------------------------------------------------------------
	public function delete(Request $req, $id) {
		Barang::find($id)->delete();
		
        return redirect()->action('BarangController@showTabelBarangWarung', ['idUser' => $req->user_id])
		->with('pesan', 'Barang Berhasil Dihapus');
	}

	///////////////////////////////////
	// public function showall(){
	// 	$tb = Barang::all();
	// 	return response()->json($tb);
	// }
	// public function find($id){
	// 	return response()->json(Barang::find($id));
	// }
	// // public function insert(Request $req){
	// // 	$tb = Barang::create($req->all());
	// // 	return response()->json('Data Berhasil Disimpan', 200);
	// // }
	// public function update(Request $req, $id){
	// 	$tb = Barang::findOrFail($id)->update($req->all());
	// 	return response()->json('Data Berhasil Diupdate', 200);
	// }
	// public function delete($id){
	// 	Barang::findOrFail($id)->delete();
	// 	return response()->json('Data Berhasil Dihapus', 200);
	// }
}