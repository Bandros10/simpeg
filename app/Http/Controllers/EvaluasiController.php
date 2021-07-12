<?php

namespace App\Http\Controllers;

use App\Models\evaluasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EvaluasiController extends Controller
{
    public function index(){
        $data = evaluasi::orderBy('created_at', 'DESC')->paginate(10);
        return view('evaluasi.index',compact('data'));
    }

    public function store(Request $request){
        $insert =  request()->except(['_token']);
        evaluasi::firstOrCreate($insert);
        return redirect()->back()->with(['sukses' => 'keteranagan Ditambahkan']);
    }

    public function destroy($id)
    {
        DB::table('evaluasis')->where('id_evaluasi',$id)->delete();
        return redirect()->back()->with(['sukses' => 'evaluasi Dihapus']);
    }
}
