<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    // Function untuk menampilkan views dari menu pegawai
    public function index(){
        //menampilkan data dari table pegawai agar bisa ditampilkan di table
       $pegawai = Pegawai::all();
       return view("admin.pegawai.pegawai",compact("pegawai"));
   }

   // Function untuk menampilkan views dari menu tambah pegawai
   public function create(){
       return view("admin.pegawai.pegawai-entry");
   }

   //Function untuk insert data ke dalam database
   public function store(Request $request) {
       //Disini server melakukan validate yang mana berarti field yang ada di dalam validate wajib diisi
       $request->validate([
           "kode_pegawai" => "required",
           "nama_pegawai" => "required",
           "alamat"=> "required",
           "no_telp"=> "required",
           "jabatan"=> "required",
       ]);

       //function create ini digunakan untuk store data ke dalam database
       Pegawai::create([
           "kode_pegawai" => $request->kode_pegawai,
           "nama_pegawai" => $request->nama_pegawai,
           "alamat" => $request->alamat,
           "no_telp" => $request->no_telp,
           "jabatan" => $request->jabatan,
       ]);
       //ketika selesai akan di alihkan ke route dengan nama supplier
       return redirect()->route("pegawai");
   }
   
   //Function untuk update data ke dalam database
   public function update(Request $request, $id) {
        //Disini server melakukan validate yang mana berarti field yang ada di dalam validate wajib diisi
        $request->validate([
            "kode_pegawai" => "required",
            "nama_pegawai" => "required",
            "alamat"=> "required",
            "no_telp"=> "required",
            "jabatan"=> "required",
        ]);
       
       //Dibuat variable jenisBarang untuk menampung data id dari table supplier
       $pegawai = Pegawai::find($id);

       // Function update digunakan untuk update data di dalam database
       $pegawai->update($request->all());

       //ketika selesai akan di alihkan ke route dengan nama supplier
       return redirect()->route("pegawai");
   }

   //Function untuk delete data database
   public function destroy($id) {
       //Dibuat variable jenisBarang untuk menampung data id dari table pegawai
       $pegawai = Pegawai::find($id);

       //function delete digunakan untuk menghapus data yang ada di dalam database
       $pegawai->delete();

       //ketika selesai akan di alihkan ke route dengan nama pegawai
       return redirect()->route("pegawai");
   }
}
