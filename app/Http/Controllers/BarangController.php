<?php

namespace App\Http\Controllers;

use App\Models\JenisBarang;
use Illuminate\Http\Request;
use App\Models\Barang;
use Barryvdh\DomPDF\Facade\Pdf;

class BarangController extends Controller
{
    // Function untuk menampilkan views dari menu barang
    public function index() {
        //menampilkan data dari table jenis_barang agar bisa ditampilkan di table
        $jenisBarang = JenisBarang::all();
         //menampilkan data dari table barang agar bisa ditampilkan di table
        $barang = Barang::all();
        return view("admin.barang.barang", compact("barang","jenisBarang"));
    }
    
    // Function untuk menampilkan views dari menu tambah barang
    public function create() {
         //menampilkan data dari table jenis_barang
        $jenisBarang = JenisBarang::all();
        return view("admin.barang.barang-entry", compact("jenisBarang"));
    }

    // Function untuk menambahkan data ke dalam database
    public function store(Request $request) {
         //Disini server melakukan validate yang mana berarti field yang ada di dalam validate wajib diisi
         $request->validate([
            "kode_barang" => "required",
            "jenis_barang_id"=> "required",
            "nama_barang"=> "required",
            "harga_jual"=> "required",
            "harga_beli"=> "required",
        ]);
        //function create ini digunakan untuk store data ke dalam database
        Barang::create([
            "kode_barang"=> $request->kode_barang,
            "jenis_barang_id"=> $request->jenis_barang_id,
            "nama_barang"=> $request->nama_barang,
            "harga_jual"=> $request->harga_jual,
            "harga_beli"=> $request->harga_beli,
        ]);

        return redirect()->route("barang");
    }

    public function update(Request $request, $id) {
        //Disini server melakukan validate yang mana berarti field yang ada di dalam validate wajib diisi
        $request->validate([
            "kode_barang" => "required",
            "jenis_barang_id"=> "required",
            "nama_barang"=> "required",
            "harga_jual"=> "required",
            "harga_beli"=> "required",
        ]); 
        
        //Dibuat variable barang untuk menampung data id dari table bbarang
        $barang = Barang::find($id);

        // Function update digunakan untuk update data di dalam database
        $barang->update($request->all());

        //ketika selesai akan di alihkan ke route dengan nama barang
        return redirect()->route("barang");
    }

     //Function untuk delete data database
     public function destroy($id) {
        //Dibuat variable barang untuk menampung data id dari table jenis_barang
        $barang = Barang::find($id);

        //function delete digunakan untuk menghapus data yang ada di dalam database
        $barang->delete();

        //ketika selesai akan di alihkan ke route dengan nama jbarang
        return redirect()->route("barang");
    }

      //function untuk cetak pdf
      public function cetak()
      {
        // $barang -> untuk mengambil semua data di table barang
          $barang = Barang::all();
          // $jenisBarang -> untuk mengambil semua data di table barang
          $jenisBarang = JenisBarang::all();
          $pdf = Pdf::loadview('layouts.report-barang', compact('barang','jenisBarang'));
          return $pdf->download('laporan-barang.pdf');
      }
}
