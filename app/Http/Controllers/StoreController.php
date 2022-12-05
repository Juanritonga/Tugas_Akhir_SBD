<?php

namespace App\Http\Controllers;

use App\Models\Gudang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StoreController extends Controller
{
    public function index() {
        $datas = DB::select('select * from stores');

        return view('store.index')
            ->with('datas', $datas);
    }

    public function create() {
        return view('store.create');
    }

    public function store(Request $request) {
        $request->validate([
            'id_store' => 'required',
            'nama_store' => 'required'
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO stores(id_store, nama_store) VALUES (:id_store, :nama_store)',
        [
            'id_store' => $request->id_store,
            'nama_store' => $request->nama_store
        ]
        );

        return redirect()->route('store.index')->with('success', 'Saved Successfully');
    }

    public function edit($id) {
        $data = DB::table('stores')->where('id_store', $id)->first();

        return view('store.edit')->with('data', $data);
    }

    public function update($id, Request $request) {
        $request->validate([
            'id_store' => 'required',
            'nama_store' => 'required'
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE stores SET id_store = :id_store, nama_store = :nama_store WHERE id_store = :id',
        [
            'id' => $id,
            'id_store' => $request->id_store,
            'nama_store' => $request->nama_store
        ]
        );

        return redirect()->route('store.index')->with('success', 'Changed Successfully');
    }

    public function delete($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM stores WHERE id_store = :id_store', ['id_store' => $id]);

        // Menggunakan laravel eloquent 
        // Admin::where('id_admin', $id)->delete();

        return redirect()->route('store.index')->with('success', 'Deleted Successfully');
    }

}
