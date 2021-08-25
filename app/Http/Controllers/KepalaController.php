<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\cuti;
use App\Models\pegawai;
use App\Models\evaluasi;
use App\Models\penilaian;
use Illuminate\Http\Request;
use App\Models\pegawai_penilaian;
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
        $data_penilaian = DB::table('pegawais')->where('status_penilaian','=',false)->count();
        $all_marketing = DB::table('pegawais')->where('devisi','marketing')->get();
        return view('kepala_devisi.marketing.all',compact('all_marketing','data_penilaian'));
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
        // dd($request->all());
        try {
            $nama = \explode(" ",$request->nama);
            $tanggal = $request->tanggal;
            $id = $request->id_pegawai;
            if (penilaian::where([['tanggal', '=', $tanggal],['id_pegawai','=',$id]])->exists()) {
                return redirect()->back()->with('error','evaluasi pada tanggal ini sudah di lakukan');
            } else {
                $penilaian = new penilaian;
                $penilaian->id_pegawai = $id;
                $penilaian->nama = $request->nama;
                $penilaian->devisi = $request->devisi;
                $penilaian->jabatan = $request->jabatan;
                $penilaian->tanggal = $request->tanggal;
                $penilaian->penilai = $request->penilai;
                $penilaian->bobot_nilai = $request->bobot_nilai;
                $penilaian->keterangan = $request->keterangan;
                $penilaian->status = $request->status;
                $penilaian->created_at = Carbon::now();
                $penilaian->updated_at = Carbon::now();
                $penilaian->save();

                DB::table('pegawais')->where([['nama_depan',$nama[0]],['nama_belakang',$nama[1]]])->update(['status_penilaian'=>true]);

                if(count($request->instrumen)>0){
                    foreach($request->instrumen as $item=>$v){
                        $data2=array(
                            'id_pegawai'=> $id,
                            'instrumen'=>$request->instrumen[$item],
                            'nilai'=>$request->nilai[$item],
                            'created_at'=>Carbon::now(),
                            'updated_at'=>Carbon::now(),
                        );
                        // dd($data2);
                        pegawai_penilaian::insert($data2);
                    }
                }
            }
            return redirect()->route('home')->with('sukses','Data penilaian Pegawai telah di nilai');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','Data penilaian harus terisi');
        }
    }

    public function data_all_penilaian(){
        $nilai_mar = penilaian::where('devisi','=','marketing')->get();
        return \view('kepala_devisi.data_nilai',\compact('nilai_mar'));
    }
}
