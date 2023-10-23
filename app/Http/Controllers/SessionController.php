<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Barang;
use App\Models\Users;
use Illuminate\Support\Facades\Validator;

class SessionController extends Controller
{
    public function __invoke(Request $request){
        $validator = validator::make($request->all(),[
            'email' => 'required',
            'password' => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        $credentials = $request->only('email', 'password');

        if(!$token = auth()->guard('api')->attempt($credentials)) {
            return response()->json([
                'success' => false,
                'message' => 'Email atau Password Anda salah'
            ], 401);
        }

        return response()->json([
            'success' => true,
            'user' => auth()->guard('api')->user(),
            'token' => $token
        ], 200);
    }

    public function checkDatabaseConnection(){
        $pdo = DB::connection()->getPdo();

        try {
            echo "Connected".DB::connection()->getDatabaseName();
        } catch (\Exception $e) {
            die("Error to connect" .$e);
        }
    }

    public function listBarang(){
       $Barang = Barang::all();
       if(empty($Barang) || $Barang == null){
        error_log('TIDAK KETEMU',404);
       }

       return response()->json($Barang);

        $pdo = DB::connection()->getPdo();

    }
}
