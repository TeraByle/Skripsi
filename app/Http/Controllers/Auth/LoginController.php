<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{

    public function index()
    {
        return view('Auth/login');
    }

    public function store(Request $request)
    {

        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ],[
            'username.required' => 'username wajib diisi',
            'password.required' => 'password wajib diisi',
        ]);

        $infologin = [
            'username' => $request->username,
            'password' => $request->password,
        ];
        if(Auth::attempt($infologin)){
            return redirect('admin/dashboard');

        }else{
            return redirect('/login')->withErrors('Username dan password yang dimasukkan tidak sesuai')->withInput();
        }
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }


    public function destroy(string $id)
    {

        return redirect()->to('superAdmin/akun')->with('success', 'Data berhasil di hapus');
    }
}
