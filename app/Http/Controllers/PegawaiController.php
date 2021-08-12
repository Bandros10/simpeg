<?php

namespace App\Http\Controllers;

use App\Models\cuti;
use App\Models\User;
use App\Models\pegawai;
use App\Models\penilaian;
use Illuminate\Http\Request;
use App\Models\pegawai_penilaian;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpWord\TemplateProcessor;

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
        $data_nilai = pegawai_penilaian::all()->where('created_at','=',$id);
        return \view('karyawan.pegawai_nilai',compact('data_nilai'));
    }

    public function konfirmasi($id){
        // dd($request->all());
        penilaian::where([['created_at','=',$id]])->update(['status' => true]);
        return redirect('pegawai/nilai')->with('sukses','anda telah menyetujuji penilaian');
    }

    public function cetak($id){
        $data_peg = DB::table('penilaians')->where('id_pegawai',$id)->first();
        $data_nil = DB::table('pegawai_penilaians')->where([['id_pegawai',$id],['created_at',$data_peg->created_at]])->select('pegawai_penilaians.*')->get();
        $templateProcessor = new TemplateProcessor('template/lembar_penilaian.docx');
        $templateProcessor->setValue('nama_karyawan', strtoupper($data_peg->nama));
        $templateProcessor->setValue('devisi', strtoupper($data_peg->devisi));
        $templateProcessor->setValue('penilai', strtoupper($data_peg->penilai));
        $templateProcessor->setValue('jabatan', strtoupper($data_peg->jabatan));
        $templateProcessor->setValue('dis_waktu', $data_nil[0]->instrumen);
        $templateProcessor->setValue('dis_waktu_nil', $data_nil[0]->nilai);
        $templateProcessor->setValue('tanggung_jawab', $data_nil[1]->instrumen);
        $templateProcessor->setValue('tanggung_jawab_nil', $data_nil[1]->nilai);
        $templateProcessor->setValue('leadership', $data_nil[2]->instrumen);
        $templateProcessor->setValue('leadership_nil', $data_nil[2]->nilai);
        $templateProcessor->setValue('etika', $data_nil[3]->instrumen);
        $templateProcessor->setValue('etika_nil', $data_nil[3]->nilai);
        $templateProcessor->setValue('kom', $data_nil[4]->instrumen);
        $templateProcessor->setValue('kom_nil', $data_nil[4]->nilai);
        $templateProcessor->setValue('kerja_baru', $data_nil[5]->instrumen);
        $templateProcessor->setValue('kerja_baru_nil', $data_nil[5]->nilai);
        $templateProcessor->setValue('belajar', $data_nil[6]->instrumen);
        $templateProcessor->setValue('belajar_nil', $data_nil[6]->nilai);
        $templateProcessor->setValue('kemampuan', $data_nil[7]->instrumen);
        $templateProcessor->setValue('kemampuan_nil', $data_nil[7]->nilai);
        $templateProcessor->setValue('team', $data_nil[8]->instrumen);
        $templateProcessor->setValue('team_nil', $data_nil[8]->nilai);
        $templateProcessor->setValue('SOP', $data_nil[9]->instrumen);
        $templateProcessor->setValue('SOP_nil', $data_nil[9]->nilai);
        $templateProcessor->setValue('gagasan', $data_nil[10]->instrumen);
        $templateProcessor->setValue('gagasan_nil', $data_nil[10]->nilai);
        $templateProcessor->setValue('diskusi', $data_nil[11]->instrumen);
        $templateProcessor->setValue('diskusi_nil', $data_nil[11]->nilai);
        $templateProcessor->setValue('sup', $data_nil[12]->instrumen);
        $templateProcessor->setValue('sup_nil', $data_nil[12]->nilai);
        $templateProcessor->setValue('motivasi', $data_nil[13]->instrumen);
        $templateProcessor->setValue('motivasi_nil', $data_nil[13]->nilai);
        $templateProcessor->setValue('inisiatif', $data_nil[14]->instrumen);
        $templateProcessor->setValue('inisiatif_nil', $data_nil[14]->nilai);

        $fileName = (strtoupper($data_peg->nama).".". $data_peg->jabatan.".". $data_peg->tanggal);
        $templateProcessor->saveAs($fileName . '.docx');
        return response()->download($fileName . '.docx')->deleteFileAfterSend(true);
    }
}
