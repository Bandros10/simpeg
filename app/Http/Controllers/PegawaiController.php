<?php

namespace App\Http\Controllers;

use App\Models\cuti;
use App\Models\User;
use App\Models\pegawai;
use App\Models\penilaian;
use Illuminate\Http\Request;
use App\Models\pegawai_penilaian;
use Illuminate\Support\Facades\DB;

class PegawaiController extends Controller
{
    public function profile(){
        $get_pegawai = DB::table('pegawais')->where([['nama_depan',auth()->user()->name],
                                                    ['email',auth()->user()->email]])->first();
        $nama = $get_pegawai->nama_depan.' '.$get_pegawai->nama_belakang;
        $cuti = cuti::where('nama_pengaju','=',$nama)->select('jumlah_cuti')->get()->count();
        return view('karyawan.profile',compact('get_pegawai','cuti'));
    }

    public function update(Request $request,$id){
        $user_nama = DB::table('pegawais')->where('id_pegawai',$id)->select('nama_depan')->first();
        $get_nama = $user_nama->nama_depan;
        try {
            $pegawai_edit = pegawai::findOrFail($id);
            $user_update = user::where('name','=',$get_nama)->first();
            $pass = bcrypt($request->nik);
            /**
             * pegawai update
             */
            $nama_depan = !empty($request->nama_depan) ? $request->nama_depan:$pegawai_edit->nama_depan;
            $nama_belakang = !empty($request->nama_belakang) ? $request->nama_belakang:$pegawai_edit->nama_belakang;
            $nik = !empty($request->nik) ? $request->nik:$pegawai_edit->nik;
            $jabatan = !empty($request->jabatan) ? $request->jabatan:$pegawai_edit->jabatan;
            $tanggungan = !empty($request->tanggungan) ? $request->tanggungan:$pegawai_edit->tanggungan;
            $email = !empty($request->email) ? $request->email:$pegawai_edit->email;
            $telepon = !empty($request->telepon) ? $request->telepon:$pegawai_edit->telepon;
            $status = !empty($request->status) ? $request->status:$pegawai_edit->status;
            $jenis_kelamin = !empty($request->jenis_kelamin) ? $request->jenis_kelamin:$pegawai_edit->jenis_kelamin;
            $agama = !empty($request->agama) ? $request->agama:$pegawai_edit->agama;
            $alamat = !empty($request->alamat) ? $request->alamat:$pegawai_edit->alamat;
            $tempat_lahir = !empty($request->tempat_lahir) ? $request->tempat_lahir:$pegawai_edit->tempat_lahir;
            $tanggal_lahir = !empty($request->tanggal_lahir) ? $request->tanggal_lahir:$pegawai_edit->tanggal_lahir;
            $pend_terakhir = !empty($request->pend_terakhir) ? $request->pend_terakhir:$pegawai_edit->pend_terakhir;
            $pend_ditempuh = !empty($request->pend_ditempuh) ? $request->pend_ditempuh:$pegawai_edit->pend_ditempuh;

            /**
             * user update
             */
            $nama_depan_user = !empty($request->nama_depan) ? $request->nama_depan:$user_update->name;
            $pass = bcrypt($nik);
            $password_update = !empty($user_update->password) ? $pass:$user_update->password;

            $pegawai_edit->update([
                                    'nama_depan' => $nama_depan,
                                    'nama_belakang' => $nama_belakang,
                                    'nik' => $nik,
                                    'jabatan' => $jabatan,
                                    'tanggungan' => $tanggungan,
                                    'email' => $email,
                                    'telepon' => $telepon,
                                    'status' => $status,
                                    'jenis_kelamin' => $jenis_kelamin,
                                    'agama' => $agama,
                                    'alamat' => $alamat,
                                    'tempat_lahir' => $tempat_lahir,
                                    'tanggal_lahir' => $tanggal_lahir,
                                    'pend_terakhir' => $pend_terakhir,
                                    'pend_ditempuh' => $pend_ditempuh
                                    ]);
            $user_update->update([
                                        'name' => $nama_depan_user,
                                        'email' => $email,
                                        'password' => $password_update]);
            return redirect()->back()->with(['sukses' => 'Data: ' . $pegawai_edit->nama_depan.' '.$pegawai_edit->nama_belakang . ' Telah Diubah']);
        } catch (\Throwable $th) {
            return redirect()->back()->with('warning','uppsss...!!! terjadi kesalahan');
        }
    }

    public function nilai(){
        $nama = pegawai::where('nama_depan','=',auth()->user()->name)->first();
        // dd($nama->nama_depan.' '.$nama->nama_belakang);
        $nilai = penilaian::where('nama','=',$nama->nama_depan.' '.$nama->nama_belakang)->get();
        return \view('karyawan.penilaian',\compact('nilai'));
    }

    public function detail($id){
        $data_nilai = pegawai_penilaian::all()->where('id_pegawai','=',$id);
        return \view('karyawan.pegawai_nilai',compact('data_nilai'));
    }

    public function konfirmasi($id){
        penilaian::where([['id','=',$id]])->update(['status' => true]);
        return redirect('pegawai/nilai')->with('sukses','anda telah menyetujuji penilaian');
    }
}
