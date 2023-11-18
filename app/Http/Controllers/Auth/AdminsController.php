<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;


use Illuminate\Support\Facades\DB;

class AdminsController extends Controller
{
    public function index(){


        return view('superAdmin.akun');
    }

    public function create()
    {
        $roles=Role::all();
        

        return view('superAdmin.tambahAkun', compact('roles'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'username' => 'required', 'username',
            'password' => 'required',
            'roles' => 'required',

        ]);
    }
}
