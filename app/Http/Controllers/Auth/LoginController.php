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
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Get the authenticated user
            $user = Auth::user();

            // Check if the user has a specific role
            if ($user->hasRole('Super Admin')) {
                return redirect()->route('home');
            } elseif ($user->hasRole('Admin')) {
                return redirect()->route('home');
            }

            // Redirect to a default route if no specific role is found
            return redirect()->route('home');
        }

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


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {

        return redirect()->to('superAdmin/akun')->with('success', 'Data berhasil di hapus');
    }
}
