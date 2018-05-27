<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;

class AuthController extends Controller
{
public function regist(Request $req) {
        $cek = User::where('email', $req->email)->first();
        if (!$cek) {
            $tb = new User;
            $tb->nama     = $req->nama;
            $tb->email    = $req->email;
            $tb->no_hp    = $req->no_hp;
            $tb->alamat   = $req->alamat;
            $tb->password = Hash::make($req->password);
            $tb->save();

            return redirect('/')
            ->with('pesanberhasil', 'Berhasil Mendaftar');  
        }else{
            return redirect('/register')
            ->with('pesan', 'Email Sudah Terdaftar');  
        }
    }

    function login(Request $req) {
        if (Auth::guard('users')->attempt([
            'email' => $req->email, 
            'password' => $req->password
        ])) {
            return redirect('/home');
        }
        else{
            return redirect('/')
            ->with('pesan', 'Username atau Password Salah');
        }
    }

    function keluar() {
        if (Auth::guard('users')->check()) {
            Auth::guard('users')->logout();
        }else if (Auth::guard('admins')->check()) {
            Auth::guard('admins')->logout();
        }
        return redirect('/');
    }
        //  public function show(){
        //     return response()->json(User::all());
        // }

        // public function delete($id){
        //     User::findOrFail($id)->delete();   
        //     return response()->json('Data Berhasil Dihapus', 200);
        // }
}