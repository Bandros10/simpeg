<?php

namespace App\Http\Controllers;

use DateTime;
use Carbon\Carbon;
use App\Models\cuti;
use App\Models\pegawai;
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

        $d = explode("-",$request->tgl_cuti);

        $to = new DateTime($d[0]);
        $from = new DateTime($d[1]);
        $interval = $to->diff($from);
        $days = $interval->format('%a');


        $awal = Carbon::parse($d[0])->format('d-m-Y');
        $akhir = Carbon::parse($d[1])->format('d-m-Y');
        $now = Carbon::now();
        $data = DB::table('pegawais')->where('email',auth()->user()->email)->first();
        $tahun_masuk = Carbon::parse($data->tanggal_masuk)->format('Y');
        $count_cuti = cuti::all()->where('id_pegawai','=',$request->id_pegawai)->count();
        $tahun = $now->year;
        // dd($tahun);
        try {
            // if ($count_cuti >= 7 &&  Carbon::now()->format('Y') == $tahun) {
            //     return redirect()->back()->with('warning','uppsss...!!! Jatah cuti anda telah melebihi kuota');
            // }
            if ($tahun_masuk == $tahun) {
                return redirect()->back()->with('warning','uppsss...!!! anda belum dapat melakukan cuti');
            }
            cuti::create(['id_pegawai' => $request->id_pegawai,
                        'jumlah_cuti' => $request->jumlah_cuti,
                        'nama_pengaju' => $request->nama_pengaju,
                        'jabatan_pengaju' => $request->jabatan_pengaju,
                        'devisi' => $request->devisi,
                        'telepon' => $request->telepon,
                        'tgl_awal' => $awal,
                        'tgl_akhir' => $akhir,
                        'keterangan' => $request->keterangan]);
            // cuti::Create($insert);
            return redirect()->back()->with(['sukses' => 'Data: ' . $request->nama_pengaju . ' mengajukan cuti']);
        } catch (\Throwable $th) {
            return redirect()->back()->with('warning','uppsss...!!! terjadi kesalahan');
        }
    }
}
