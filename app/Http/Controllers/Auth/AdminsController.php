<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminsController extends Controller
{
    public function index(){
        $roles = User::with('roles')->get();


        // Tampilkan data user dan roles di halaman
        $new_account = User::all();
        // dd($roles);
        return view('superAdmin.akun',compact('new_account','roles'));
    }



    public function create()
    {
        $roles=Role::all();


        return view('superAdmin.tambahAkun', compact('roles'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        $new_account = [
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => bcrypt($request->password),
        ];

        // Menetapkan role ke user yang baru dibuat
        $user = User::create($new_account);
        $user->assignRole($request->role);
        dd($user);

        return redirect()->route('account_management');

    }
}
