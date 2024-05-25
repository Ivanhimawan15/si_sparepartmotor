<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisBarang;

class JenisBarangController extends Controller
{
     // Function untuk menampilkan views dari menu jenis barang
    public function index() {
         //menampilkan data dari table jenis_barang agar bisa ditampilkan di table
        $jenisBarang = JenisBarang::all();
        return view("admin.jenis.jenis-barang", compact("jenisBarang"));
    }

     // Function untuk menampilkan views dari menu tambah jenis barang
    public function create() {
        return view("admin.jenis.jenis-barang-entry");
    }

    //Function untuk insert data ke dalam database
    public function store(Request $request) {
        //Disini server melakukan validate yang mana berarti field yang ada di dalam validate wajib diisi
        $request->validate([
            "kode_jenis_barang" => "required",
            "nama_jenis_barang"=> "required",
            "keterangan"=> "required",
        ]);

        //function create ini digunakan untuk store data ke dalam database
        JenisBarang::create([
            "kode_jenis_barang" => $request->kode_jenis_barang,
            "nama_jenis_barang" => $request->nama_jenis_barang,
            "keterangan" => $request->keterangan,
        ]);
        //ketika selesai akan di alihkan ke route dengan nama jenis-barang
        return redirect()->route("jenis");
    }
    
    //Function untuk update data ke dalam database
    public function update(Request $request, $id) {
         //Disini server melakukan validate yang mana berarti field yang ada di dalam validate wajib diisi
         $request->validate([
            "kode_jenis_barang" => "required",
            "nama_jenis_barang"=> "required",
            "keterangan"=> "required",
        ]); 
        
        //Dibuat variable jenisBarang untuk menampung data id dari table jenis_barang
        $jenisBarang = JenisBarang::find($id);

        // Function update digunakan untuk update data di dalam database
        $jenisBarang->update($request->all());

        //ketika selesai akan di alihkan ke route dengan nama jenis-barang
        return redirect()->route("jenis");
    }

    //Function untuk delete data database
    public function destroy($id) {
        //Dibuat variable jenisBarang untuk menampung data id dari table jenis_barang
        $jenisBarang = JenisBarang::find($id);

        //function delete digunakan untuk menghapus data yang ada di dalam database
        $jenisBarang->delete();

        //ketika selesai akan di alihkan ke route dengan nama jenis-barang
        return redirect()->route("jenis");
    }
}
