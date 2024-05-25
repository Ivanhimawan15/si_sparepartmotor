<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\StokBarang;
use Illuminate\Http\Request;

class StokBarangController extends Controller
{
    public function index(){
        $stok = StokBarang::all();
        $barang = Barang::all();
        return view("admin.stok.stok", compact("stok","barang"));
    }

    // Function untuk menampilkan views dari menu tambah stok
    public function create() {
        //menampilkan data dari table barang
       $barang = Barang::all();
       return view("admin.stok.stok-entry", compact("barang"));
   }

   // Function untuk menambahkan data ke dalam database
   public function store(Request $request) {
        //Disini server melakukan validate yang mana berarti field yang ada di dalam validate wajib diisi
        $request->validate([
           "kode_stok" => "required",
           "barang_id"=> "required",
           "jumlah_stok"=> "required",
       ]);
       //function create ini digunakan untuk store data ke dalam database
       StokBarang::create([
           "kode_stok"=> $request->kode_stok,
           "barang_id"=> $request->barang_id,
           "jumlah_stok"=> $request->jumlah_stok,
       ]);

       return redirect()->route("stok");
   }

   public function update(Request $request, $id) {
       //Disini server melakukan validate yang mana berarti field yang ada di dalam validate wajib diisi
       $request->validate([
        "kode_stok" => "required",
        "barang_id"=> "required",
        "jumlah_stok"=> "required",
    ]);
       
       //Dibuat variable barang untuk menampung data id dari table stok
       $stok = StokBarang::find($id);

       // Function update digunakan untuk update data di dalam database
       $stok->update($request->all());

       //ketika selesai akan di alihkan ke route dengan nama stok
       return redirect()->route("stok");
   }

    //Function untuk delete data database
    public function destroy($id) {
       //Dibuat variable barang untuk menampung data id dari table stok
       $stok = StokBarang::find($id);

       //function delete digunakan untuk menghapus data yang ada di dalam database
       $stok->delete();

       //ketika selesai akan di alihkan ke route dengan nama stok
       return redirect()->route("stok");
   }
}