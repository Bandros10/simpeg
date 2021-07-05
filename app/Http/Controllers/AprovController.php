<?php

namespace App\Http\Controllers;

use App\Models\cuti;
use App\Models\pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AprovController extends Controller
{
    public function index(){
        $data_pegawai = pegawai::all();
        return view('hrd.aprov.index',compact('data_pegawai'));
    }

    public function data_aproval_cuti($id){
        $data_cuti = cuti::where('id_pegawai','=',$id)->get();
        // dd($data_cuti);
        return view('hrd.aprov.data',compact('data_cuti'));
    }

    public function update_status_approv($id_cuti){
        DB::table('cutis')->where('id_cuti',$id_cuti)->update(['status'=>true]);
        return redirect()->back()->with('sukses','Pengajuan Cuti Telah Di Approval');
    }
}
