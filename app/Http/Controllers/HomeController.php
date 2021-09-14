<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\cuti;
use App\Models\pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $permintaan = cuti::all()->where('status','=',0)->count();
        $pending = cuti::all()->where('status','=',1)->count();
        $approval = cuti::all()->where('status','=',2)->count();
        $pegawai = pegawai::all()->count();
        $pegawai_marketing = pegawai::where('devisi','=','marketing')->count();
        // dd(date('d m Y'));
        return view('home',compact('permintaan','approval','pending','pegawai','pegawai_marketing'));
    }

    public function update_status_penilaian(Request $request){
        $get_update_at = DB::table('pegawais')->select('pegawais.updated_at')->first();
        $moth_now = Carbon::parse($get_update_at->updated_at)->format('m');
        if ($moth_now  != date('m')) {
            pegawai::query()->update(['status_penilaian' => false],['updated_at' => date('Y-m-d H:i:s')]);
        } else {
            return "data masih bulan ini";
        }
    }

    public function update_hari_cuti(Request $request){
        $get_data_hari = DB::table('pegawais')->select('pegawais.updated_at')->first();
        $year_now = Carbon::parse($get_data_hari->updated_at)->format('Y');
        if ($year_now  != date('Y')) {
            pegawai::query()->update(['hari_cuti' => 12]);
        } else {
            return "cuti masih tahun ini";
        }
    }
}
