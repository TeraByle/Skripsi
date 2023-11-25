<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;


use Illuminate\Support\Facades\DB;

class AdminsController extends Controller
{
    public function index(){

        $new_account = User::all();
        return view('superAdmin.akun',compact('new_account'));
    }

    public function index2(){
        return view('user/homepage');
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
            'username' => 'required', 'username',
            'password' => 'required',
            'role' => 'required',

        ]);
        // dd($request);

        $new_account = [
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ];
        // dd($new_account);
        User::create($new_account);
        return redirect()->route('account_manangement');

    }
}
