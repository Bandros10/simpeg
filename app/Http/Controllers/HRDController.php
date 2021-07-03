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
            return redirect()->back()->with('sukses','berhasil menambhakan data pegawai baru '.$request->nama_depan.' '.$request->nama_belakang);
        } else {
            return redirect()->back()->with('warning','uppsss...!!! maaf data '. $request->nama.' sudah terdaftar, menggunakan email '.$request->email);
        }
    }

    public function destroy($id_pegawai){
        $mail = DB::table('pegawais')->where('id_pegawai',$id_pegawai)->select('email')->first();
        $get_mail = $mail->email;

        $user_delete = user::where('email','=',$get_mail)->first();
        $user_delete->delete();
        $pegawai_delete = pegawai::findOrfail($id_pegawai);
        $pegawai_delete->delete();
        return redirect()->back()->with(['sukses' => 'Data: ' . $pegawai_delete->nama_depan.' '.$pegawai_delete->nama_belakang . ' Telah Dihapus']);
    }

    public function edit($show_pegawai){
        $show = pegawai::findOrFail($show_pegawai);
        return view('hrd.show_pegawai',compact('show'));
    }

    public function update(Request $request,$id_pegawai){
        $user_nama = DB::table('pegawais')->where('id_pegawai',$id_pegawai)->select('nama_depan')->first();
        $get_nama = $user_nama->nama_depan;
        try {
            $pegawai_edit = pegawai::findOrFail($id_pegawai);
            $user_update = user::where('name','=',$get_nama)->first();
            $pass = bcrypt($request->nama_depan.substr($request->telepon,9,13));
            /**
             * pegawai update
             */
            $nama_depan = !empty($request->nama_depan) ? $request->nama_depan:$pegawai_edit->nama_depan;
            $nama_belakang = !empty($request->nama_belakang) ? $request->nama_belakang:$pegawai_edit->nama_belakang;
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
            $pass = bcrypt($nama_depan.substr($telepon,9,13));
            $password_update = !empty($user_update->password) ? $pass:$user_update->password;

            $pegawai_edit->update([
                                    'nama_depan' => $nama_depan,
                                    'nama_belakang' => $nama_belakang,
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
}
