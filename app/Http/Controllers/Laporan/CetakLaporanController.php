<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CetakLaporanController extends Controller
{
    public function index(){
        return view('superAdmin/cetakLaporan');
    }

    public function fetch_data(){
        
    }
}
