<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    function index(){
        return view("login/index");
    }
    function login(Request $request){
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
    }
}
