<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class KeteranganController extends Controller
{
    public function index()
    {
       $datas = DB::select('select * from barangs b inner join gudangs g on b.id_gudang = g.id_gudang inner join stores s on b.id_store = s.id_store');
       return view('keterangan.index',[
        'datas' => $datas
       ]);
    }
}