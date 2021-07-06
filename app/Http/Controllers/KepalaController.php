<?php

namespace App\Http\Controllers;

use App\Models\cuti;
use App\Models\pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KepalaController extends Controller
{
    public function index(){
        $data_pegawai_kepala = pegawai::all();
        return view('kepala_devisi.aprov.index',compact('data_pegawai_kepala'));
    }

    public function data_cuti_kepala($id){
        $data_cuti = cuti::where('id_pegawai','=',$id)->get();
        // dd($data_cuti);
        return view('kepala_devisi.aprov.data',compact('data_cuti'));
    }

    public function update($id){
        DB::table('cutis')->where('id_cuti',$id)->update(['status_kepala'=>true]);
        return redirect()->back()->with('sukses','Pengajuan Cuti Telah Di Approval');
    }

    public function tolak($id){
        DB::table('cutis')->where('id_cuti',$id)->update(['status_kepala'=>false]);
        return redirect()->back()->with('sukses','Pengajuan Cuti Telah Di Approval');
    }
}
