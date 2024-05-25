<?php

namespace App\Http\Controllers;

use App\Models\Gudang;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Pengiriman;
use App\Models\JenisBarang;

class PengirimanController extends Controller
{
    // Function untuk menampilkan views dari menu pengiriman
    public function index() {
        //menampilkan data dari table pengiriman agar bisa ditampilkan di table
        $pengiriman = Pengiriman::all();
         //menampilkan data dari table barang agar bisa ditampilkan di table
        $barang = Barang::all();
        $gudang = Gudang::all();
        return view("admin.pengiriman.pengiriman", compact("barang","pengiriman","gudang"));
    }
    
    // Function untuk menampilkan views dari menu tambah barang
    public function create() {
         //menampilkan data dari table jenis_barang
        $barang = Barang::all();
        $gudang = Gudang::all();
        return view("admin.pengiriman.pengiriman-entry", compact("barang","gudang"));
    }

    // Function untuk menambahkan data ke dalam database
    public function store(Request $request) {
         //Disini server melakukan validate yang mana berarti field yang ada di dalam validate wajib diisi
         $request->validate([
            "kode_pengiriman" => "required",
            "gudang_id"=> "required",
            "barang_id"=> "required",
            "jumlah_barang"=> "required",
            "tanggal"=> "required",
        ]);
        //function create ini digunakan untuk store data ke dalam database
        Pengiriman::create([
            "kode_pengiriman"=> $request->kode_pengiriman,
            "gudang_id"=> $request->gudang_id,
            "barang_id"=> $request->barang_id,
            "jumlah_barang"=> $request->jumlah_barang,
            "tanggal"=> $request->tanggal,
        ]);

        return redirect()->route("pengiriman");
    }

    public function update(Request $request, $id) {
        //Disini server melakukan validate yang mana berarti field yang ada di dalam validate wajib diisi
        $request->validate([
            "kode_pengiriman" => "required",
            "gudang_id"=> "required",
            "barang_id"=> "required",
            "jumlah_barang"=> "required",
            "tanggal"=> "required",
        ]);
        
        //Dibuat variable barang untuk menampung data id dari table pengiriman
        $pengiriman = Pengiriman::find($id);

        // Function update digunakan untuk update data di dalam database
        $pengiriman->update($request->all());

        //ketika selesai akan di alihkan ke route dengan nama pengiriman
        return redirect()->route("pengiriman");
    }

     //Function untuk delete data database
     public function destroy($id) {
        //Dibuat variable barang untuk menampung data id dari table jenis_barang
        $pengiriman = Pengiriman::find($id);

        //function delete digunakan untuk menghapus data yang ada di dalam database
        $pengiriman->delete();

        //ketika selesai akan di alihkan ke route dengan nama jbarang
        return redirect()->route("pengiriman");
    }
}
