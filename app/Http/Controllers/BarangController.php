<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BarangController extends Controller
{
    public function index() {
        $datas = DB::select('select * from barangs where deleted_at is NULL');

        return view('barang.index')
            ->with('datas', $datas);
    }

    public function create() {
        return view('barang.create');
    }

    public function store(Request $request) {
        $request->validate([
            'id_barang' => 'required',
            'nama_barang' => 'required',
            'harga' => 'required',
            'stock' => 'required',
            'id_gudang' =>'required',
            'id_store' =>'required'
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO barangs (id_barang, nama_barang, harga, stock, id_gudang, id_store) VALUES (:id_barang, :nama_barang, :harga, :stock, :id_gudang, :id_store)',
        [
            'id_barang' => $request->id_barang,
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'stock' => $request->stock,
            'id_gudang' => $request->id_gudang,
            'id_store' => $request->id_store
        ]
        );

        return redirect()->route('barang.index')->with('success', 'Saved Successful');
    }

    public function edit($id) {
        $data = DB::table('barangs')->where('id_barang', $id)->first();

        return view('barang.edit')->with('data', $data);
    }
    public function show($id)
        {
        $data = DB::select('select * from barang b inner join gudang g on b.id_gudang = g.id_gudang inner join store s on b.id_store = s.id_store WHERE id_barang = :id',[$id])[0];
            return view('barang.show', [
                'data' => $data,
            ]);
        }

    public function update($id, Request $request) {
        $request->validate([
            'id_barang' => 'required',
            'nama_barang' => 'required',
            'harga' => 'required',
            'stock' => 'required',
            'id_gudang' =>'required',
            'id_store' =>'required'
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE barangs SET id_barang = :id_barang, nama_barang = :nama_barang, harga = :harga, stock = :stock, id_gudang = :id_gudang, id_store = :id_store WHERE id_barang = :id',
        [
            'id' => $id,
            'id_barang' => $request->id_barang,
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'stock' => $request->stock,
            'id_gudang' => $request->id_gudang,
            'id_store' => $request->id_store
        ]
        );

        return redirect()->route('barang.index')->with('success', 'Changed Successful');
    }
    public function softDelete($id)
    {
        DB::update('UPDATE barangs SET deleted_at = ? where id_barang = ?',[
            now(),
            $id
        ]);

        return redirect('/soft');
    }

    public function restore($id)
    {
        DB::update('UPDATE barangs SET deleted_at = ? where id_barang = ?',[
            null,
            $id
        ]);

        return redirect('/soft');
    }


    public function hardDelete($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM barangs WHERE id_barang = :id_barang', ['id_barang' => $id]);

        return redirect()->route('softDelete')->with('success', 'Deleted Successful');
    }

    public function softIndex(){

        $datas = DB::select('select * from barangs b inner join gudangs g on b.id_gudang = g.id_gudang inner join stores s on b.id_store = s.id_store where b.deleted_at is NOT NULL');

        return view('soft.index', [
            'datas' => $datas
        ]);
    }

    public function trashed()
    {
        $datas = DB::select('select * from barangs b inner join gudangs g on b.id_gudang = g.id_gudang inner join stores s on b.id_store = s.id_store where b.deleted_at is NOT NULL');

        return view('soft.index', [
            'datas' => $datas
        ]);
    }

}
