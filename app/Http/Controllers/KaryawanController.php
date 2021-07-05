<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\cuti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KaryawanController extends Controller
{
    public function index(){
        $data_pegawai = DB::table('pegawais')->where([['nama_depan',auth()->user()->name],
                                                    ['email',auth()->user()->email]])->first();
        $nama = $data_pegawai->nama_depan.' '.$data_pegawai->nama_belakang;
        $data_pegawai_cuti = DB::table('cutis')->where([['nama_pengaju',$nama],['id_pegawai',$data_pegawai->id_pegawai]])->get();
        return view('karyawan.cuti.index',compact('data_pegawai','data_pegawai_cuti'));
    }

    public function store(Request $request){
        $insert =  request()->except(['_token']);
        try {
            cuti::Create($insert);
            return redirect()->back()->with(['sukses' => 'Data: ' . $request->nama_pengaju . ' mengajukan cuti']);
        } catch (\Throwable $th) {
            return redirect()->back()->with('warning','uppsss...!!! terjadi kesalahan');
        }
    }
}
