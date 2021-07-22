<?php

namespace App\Http\Controllers;

use App\Models\cuti;
use App\Models\pegawai;
use App\Models\evaluasi;
use App\Models\penilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KepalaController extends Controller
{
    public function index_marketing(){
        $data_pegawai_kepala_marketing = pegawai::where('devisi','=','marketing')->get();
        return view('kepala_devisi.marketing.index',compact('data_pegawai_kepala_marketing'));
    }

    public function alladministrasi(){
        $all_admin = DB::table('pegawais')->where('devisi','administrasi')->get();
        return view('kepala_devisi.administrasi.all',compact('all_admin'));
    }

    public function allmarketing(){
        $all_marketing = DB::table('pegawais')->where('devisi','marketing')->get();
        return view('kepala_devisi.marketing.all',compact('all_marketing'));
    }

    public function penilaian($id){
        $penilaian = pegawai::find($id);
        $ev = evaluasi::all();
        return view('kepala_devisi.penilaian',compact('penilaian','ev'));
    }

    public function index_administrasi(){
        $data_pegawai_kepala_administrasi = pegawai::where('devisi','=','administrasi')->get();
        return view('kepala_devisi.administrasi.index',compact('data_pegawai_kepala_administrasi'));
    }

    public function data_cuti_kepala_marketing($id){
        $data_cuti = cuti::where('id_pegawai','=',$id)->get();
        // dd($data_cuti);
        return view('kepala_devisi.marketing.data',compact('data_cuti'));
    }

    public function data_cuti_kepala_administrasi($id){
        $data_cuti = cuti::where('id_pegawai','=',$id)->get();
        // dd($data_cuti);
        return view('kepala_devisi.administrasi.data',compact('data_cuti'));
    }

    public function update($id){
        DB::table('cutis')->where('id_cuti',$id)->update(['status_kepala'=>true]);
        DB::table('cutis')->where('id_cuti',$id)->update(['status'=>1]);
        return redirect()->back()->with('sukses','Pengajuan Cuti Telah Di Approval');
    }

    public function tolak($id){
        DB::table('cutis')->where('id_cuti',$id)->update(['status'=>3]);
        return redirect()->back()->with('error','Pengajuan Cuti tidak di approv');
    }

    public function penilaian_store(Request $request){
        $tanggal = $request->tanggal;
        $id = $request->id_pegawai;
        $request =  request()->except(['_token']);
        if (penilaian::where([['tanggal', '=', $tanggal],['id_pegawai','=',$id]])->exists()) {
            return redirect()->back()->with('error','evaluasi pada tanggal ini sudah di lakukan');
        } else {
            penilaian::firstOrCreate($request);
        }
        return redirect()->route('home')->with('sukses','Data penilaian Pegawai telah di nilai');
    }

    public function data_all_penilaian(){
        $nilai_mar = penilaian::where('devisi','=','marketing')->get();
        return \view('kepala_devisi.data_nilai',\compact('nilai_mar'));
    }
}
