<?php

namespace App\Http\Controllers;

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
        // dd($data_permintaan);
        return view('home',compact('permintaan','approval','pending','pegawai','pegawai_marketing'));
    }
}
