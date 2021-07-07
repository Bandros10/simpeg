<?php

namespace App\Http\Controllers;

use App\Models\cuti;
use App\Models\pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpWord\TemplateProcessor;

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
        DB::table('cutis')->where('id_cuti',$id_cuti)->update(['status'=>2]);
        DB::table('cutis')->where('id_cuti',$id_cuti)->update(['status_hrd'=>true]);
        return redirect()->back()->with('sukses','Pengajuan Cuti Telah Di Approval');
    }

    public function cetak_form($id_cuti){
        $cuti = DB::table('cutis')->where('id_cuti',$id_cuti)->select('cutis.*')->first();
        $tgl_cuti = explode('-',$cuti->tgl_cuti);
        $datenow = \Carbon\carbon::now()->translatedFormat(' d F Y');
        $templateProcessor = new TemplateProcessor('template/form_cuti.docx');
        $templateProcessor->setValue('nama', strtoupper($cuti->nama_pengaju));
        $templateProcessor->setValue('devisi', strtoupper($cuti->devisi));
        $templateProcessor->setValue('jabatan', strtoupper($cuti->jabatan_pengaju));
        $templateProcessor->setValue('awal', \Carbon\carbon::parse($tgl_cuti[0])->translatedFormat(' d F Y'));
        $templateProcessor->setValue('akhir', \Carbon\carbon::parse($tgl_cuti[1])->translatedFormat(' d F Y'));
        $templateProcessor->setValue('keterangan', strtoupper($cuti->keterangan));
        $templateProcessor->setValue('telepon', strtoupper($cuti->telepon));
        $templateProcessor->setValue('datenow', strtoupper($datenow));

        $fileName = (strtoupper($cuti->nama_pengaju).".". $cuti->jabatan_pengaju.".". $datenow);
        $templateProcessor->saveAs($fileName . '.docx');
        return response()->download($fileName . '.docx')->deleteFileAfterSend(true);
    }
}
