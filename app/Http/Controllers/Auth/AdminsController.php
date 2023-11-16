<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User;

class AdminsController extends Controller
{
    public function index(){
        return view('superAdmin.akun');
    }

    public function create(){

        return view('superAdmin.tambahAkun');
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
