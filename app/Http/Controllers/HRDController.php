<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class HRDController extends Controller
{
    public function index(){
        $data_pegawai = pegawai::all();
        return view('hrd.data_pegawai',compact('data_pegawai'));
    }

    public function store(Request $request){
        $pegawai = pegawai::where('email','=',$request->email)->first();
        $pass = bcrypt($request->nama_depan.substr($request->telepon,9,13));
        // dd($pass)
        $nama = $request->nama_depan;
        // DB::select('CALL add_user(?, ?, ?)',[$request->post('nama_depan'),$request->post('email'),$pass]);
        if ($pegawai === null) {
            $user = User::firstOrCreate([
                'email' => $request->email
            ], [
                'name' => $nama,
                'password' => $pass,
            ]);
            $user->assignRole('karyawan');
            pegawai::Create($request->all());
            return redirect()->back()->with('sukses','berhasil menambhakan data pegawai baru '.$request->nama);
        } else {
            return redirect()->back()->with('warning','uppsss...!!! maaf data '. $request->nama.' sudah terdaftar, menggunakan email '.$request->email);
        }
    }
}
