<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function index(){
        return view("/sesi/login");
    }
    public function login(Request $request){
        //proses validasi
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ],[
        //proses notifikasi
            'username.required' => 'Username wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        $infologin = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if(Auth::attempt($infologin)){
            //jika otentikasi sukses
            return 'sukses';
        }else{
            //jika otentikasi gagal
            return 'gagal';
        }
    }
}
