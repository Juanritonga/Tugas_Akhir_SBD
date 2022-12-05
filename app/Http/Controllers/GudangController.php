<?php

namespace App\Http\Controllers;

use App\Models\Gudang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class GudangController extends Controller
{
    public function index() {
        $datas = DB::select('select * from gudangs');

        return view('gudang.index')
            ->with('datas', $datas);
    }

    public function create() {
        return view('gudang.create');
    }

    public function store(Request $request) {
        $request->validate([
            'id_gudang' => 'required',
            'nama_gudang' => 'required'
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO gudangs(id_gudang, nama_gudang) VALUES (:id_gudang, :nama_gudang)',
        [
            'id_gudang' => $request->id_gudang,
            'nama_gudang' => $request->nama_gudang
        ]
        );

        return redirect()->route('gudang.index')->with('success', 'Saved Successfully');
    }

    public function edit($id) {
        $data = DB::table('gudangs')->where('id_gudang', $id)->first();

        return view('gudang.edit')->with('data', $data);
    }

    public function update($id, Request $request) {
        $request->validate([
            'id_gudang' => 'required',
            'nama_gudang' => 'required'
        ]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE gudangs SET id_gudang = :id_gudang, nama_gudang = :nama_gudang WHERE id_gudang = :id',
        [
            'id' => $id,
            'id_gudang' => $request->id_gudang,
            'nama_gudang' => $request->nama_gudang
        ]
        );

        return redirect()->route('gudang.index')->with('success', 'Changed Successfully');
    }

    public function delete($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM gudangs WHERE id_gudang = :id_gudang', ['id_gudang' => $id]);

        // Menggunakan laravel eloquent 
        // Admin::where('id_admin', $id)->delete();

        return redirect()->route('gudang.index')->with('success', 'Deleted Successfully');
    }

}
