<?php

namespace App\Http\Controllers;

use App\Models\Gudang;
use App\Models\StokBarang;
use Illuminate\Http\Request;
use App\Models\Barang;


class GudangController extends Controller
{
    // Function untuk menampilkan views dari menu barang
    public function index() {
        //menampilkan data dari table stok agar bisa ditampilkan di table
        $stok = StokBarang::all();
         //menampilkan data dari table barang agar bisa ditampilkan di table
        $barang = Barang::all();
        $gudang = Gudang::all();
        return view("admin.gudang.gudang", compact("stok","barang","gudang"));
    }
    
    // Function untuk menampilkan views dari menu tambah barang
    public function create() {
        //menampilkan data dari table stok agar bisa ditampilkan di table
        $stok = StokBarang::all();
         //menampilkan data dari table barang agar bisa ditampilkan di table
        $barang = Barang::all();
        return view("admin.gudang.gudang-entry", compact("stok","barang"));
    }

    // Function untuk menambahkan data ke dalam database
    public function store(Request $request) {
         //Disini server melakukan validate yang mana berarti field yang ada di dalam validate wajib diisi
         $request->validate([
            "kode_gudang" => "required",
            "stok_barang_id"=> "required",
            "barang_id"=> "required",
            "tanggal"=> "required",
        ]);
        //function create ini digunakan untuk store data ke dalam database
        Gudang::create([
            "kode_gudang"=> $request->kode_gudang,
            "stok_barang_id"=> $request->stok_barang_id,
            "barang_id"=> $request->barang_id,
            "tanggal"=> $request->tanggal,
        ]);

        return redirect()->route("gudang");
    }

    public function update(Request $request, $id) {
        //Disini server melakukan validate yang mana berarti field yang ada di dalam validate wajib diisi
        $request->validate([
            "kode_gudang" => "required",
            "stok_barang_id"=> "required",
            "barang_id"=> "required",
            "tanggal"=> "required",
        ]); 
        
        //Dibuat variable barang untuk menampung data id dari table gudang
        $gudang = Gudang::find($id);

        // Function update digunakan untuk update data di dalam database
        $gudang->update($request->all());

        //ketika selesai akan di alihkan ke route dengan nama barang
        return redirect()->route("gudang");
    }

     //Function untuk delete data database
     public function destroy($id) {
        //Dibuat variable barang untuk menampung data id dari table jenis_barang
        $gudang = Gudang::find($id);

        //function delete digunakan untuk menghapus data yang ada di dalam database
        $gudang->delete();

        //ketika selesai akan di alihkan ke route dengan nama jbarang
        return redirect()->route("gudang");
    }

  

}
