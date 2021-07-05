<?php

namespace App\Http\Controllers;

use App\Models\cuti;
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
        $permintaan = cuti::all()->where('status','=',false)->count();
        $approval = cuti::all()->where('status','=',true)->count();
        // dd($data_permintaan);
        return view('home',compact('permintaan','approval'));
    }
}
