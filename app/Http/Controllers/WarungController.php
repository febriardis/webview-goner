<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Warung;

class WarungController extends Controller
{    

	public function showall(){
		$tb = Warung::all();
		return view('show_warung')
		->with('tabel', $tb);
	}	

	public function viewTambah(){
		return view('tambah_warung'); //response()->json(Kategori::all());
	}
	public function insert(Request $req){
		//Warung::create($req->all());
		$tb              = new Warung;
		$tb->user_id     = $req->user_id;
		$tb->nm_warung   = $req->nm_warung;

		$file = $req->file('foto');
        $ext  = $file->getClientOriginalExtension();
        $newName = rand(100000,1001238912).".".$ext;
        $file->move('uploads/file',$newName);
       
		$tb->foto 	     = $newName;
		$tb->hp_warung 	 = $req->hp_warung;
		$tb->almt_warung = $req->almt_warung;
		$tb->deskripsi   = $req->deskripsi;
		$tb->save();

		return redirect('/tabelpenjualan')
		->with('pesan', 'berhasil ditambahkan');
	}

	public function delete($userId){
		Warung::findOrFail($userId)->delete();
		return redirect('/home');
	}
	/////////////////////////////////////////////////////////

	public function find($id){
		return response()->json(Warung::find($id));
	}
	// public function insert(Request $req){
	// 	Warung::create($req->all());
	// 	return response()->json('Data Berhasil Disimpan', 200);
	// }
	public function update(Request $req, $id){
		$tb = Warung::findOrFail($id)->update($req->all());
		return response()->json('Data Berhasil Diupdate', 200);
	}
	// public function delete($id){
	// 	Warung::findOrFail($id)->delete();
	// 	return response()->json('Data Berhasil Dihapus', 200);
	// }
}