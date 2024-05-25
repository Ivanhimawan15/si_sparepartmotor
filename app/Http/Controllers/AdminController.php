<?php

namespace App\Http\Controllers;

use App\Models\JenisBarang;
use App\Models\Pegawai;
use App\Models\Supplier;
use App\Models\Barang;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        $barangCount = Barang::count();
        $jenisBarangCount = JenisBarang::count();
        $pegawaiCount = Pegawai::count();
        $supplierCount = Supplier::count();  
        return view("admin.dashboard.index",compact("barangCount","jenisBarangCount", "pegawaiCount","supplierCount"));
    }
}
