<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{

    public function index()
    {
        return view('Auth.login');
    }



    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required', 'username',
            'password' => 'required',
        ]);

        // dd($credentials);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('home');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email','password');
    }





    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {

        return redirect()->to('superAdmin/akun')->with('success', 'Data berhasil di hapus');
    }
}
