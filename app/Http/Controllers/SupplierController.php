<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
     // Function untuk menampilkan views dari menu supplier
    public function index(){
         //menampilkan data dari table supplier agar bisa ditampilkan di table
        $supplier = Supplier::all();
        return view("admin.supplier.supplier",compact("supplier"));
    }

    // Function untuk menampilkan views dari menu tambah supplier
    public function create(){
        return view("admin.supplier.supplier-entry");
    }

    //Function untuk insert data ke dalam database
    public function store(Request $request) {
        //Disini server melakukan validate yang mana berarti field yang ada di dalam validate wajib diisi
        $request->validate([
            "kode_supplier" => "required",
            "nama_supplier"=> "required",
            "alamat"=> "required",
            "no_telp"=> "required",
        ]);

        //function create ini digunakan untuk store data ke dalam database
        Supplier::create([
            "kode_supplier" => $request->kode_supplier,
            "nama_supplier" => $request->nama_supplier,
            "alamat" => $request->alamat,
            "no_telp" => $request->no_telp,
        ]);
        //ketika selesai akan di alihkan ke route dengan nama supplier
        return redirect()->route("supplier");
    }
    
    //Function untuk update data ke dalam database
    public function update(Request $request, $id) {
         //Disini server melakukan validate yang mana berarti field yang ada di dalam validate wajib diisi
         $request->validate([
            "kode_supplier" => "required",
            "nama_supplier"=> "required",
            "alamat"=> "required",
            "no_telp"=> "required",
        ]);
        
        //Dibuat variable jenisBarang untuk menampung data id dari table supplier
        $supplier = Supplier::find($id);

        // Function update digunakan untuk update data di dalam database
        $supplier->update($request->all());

        //ketika selesai akan di alihkan ke route dengan nama supplier
        return redirect()->route("supplier");
    }

    //Function untuk delete data database
    public function destroy($id) {
        //Dibuat variable jenisBarang untuk menampung data id dari table supplier
        $supplier = Supplier::find($id);

        //function delete digunakan untuk menghapus data yang ada di dalam database
        $supplier->delete();

        //ketika selesai akan di alihkan ke route dengan nama supplier
        return redirect()->route("supplier");
    }
}
