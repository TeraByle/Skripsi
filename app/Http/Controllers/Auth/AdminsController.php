<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
    public function index(){
        return view('superAdmin.akun');
    }

    public function create(){

        return view('superAdmin.tambahAkun');
    }
}
