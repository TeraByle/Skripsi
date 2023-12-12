<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        // dd($infologin);
        if(Auth::attempt($infologin)){
            if(Auth::user()->role == 'superAdmin'){
                return redirect('superAdmin/home');
            }else{
                return redirect('admin/homepage');
            }

        }else{
            return redirect('/login')->withErrors('Username dan password yang dimasukkan tidak sesuai')->withInput();
        }
        return redirect()->route('superAdmin/home');

        // if (Auth::attempt($credentials)) {
        //     $request->session()->regenerate();

        //     // Get the authenticated user
        //     $user = Auth::user();

        //     // Check if the user has a specific role
        //     if ($user->hasRole('Super Admin')) {
        //         return redirect()->route('superAdmin/home');
        //     } elseif ($user->hasRole('Admin')) {
        //         return redirect('admin/homepage');
        //     }

            // Redirect to a default route if no specific role is found
            // return redirect()->route('superAdmin/home');
        // }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username', 'password');

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
