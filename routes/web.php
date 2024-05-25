<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\GudangController;
use App\Http\Controllers\JenisBarangController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PengirimanController;
use App\Http\Controllers\StokBarangController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AdminController::class, 'index'])->name('home');


// Routing untuk ke menu barang
Route::get('/barang', [BarangController::class, 'index'])->name('barang');
// Routing untuk ke menu tambah barang
Route::get('/barang-entry', [BarangController::class, 'create'])->name('barang-entry');
//Routing post untuk melakukan action insert data barang
Route::post('/barang-entry', [BarangController::class,'store'])->name('barang-store');
//Routing post untuk melakukan action update data barang
Route::post('/barang-update/{id}', [BarangController::class, 'update'])->name('barang-update');
//Routing get juga dapat dilakukan untuk action delete
Route::get('/barang-delete/{id}',[BarangController::class, 'destroy'])->name('barang-delete');
//routing report pdf 
Route::get('/report/barang', [BarangController::class,'cetak'])->name('report-barang');


//routing untuk ke menu jenis barang
Route::get('/jenis-barang', [JenisBarangController::class, 'index'])->name('jenis');
// Routing untuk ke menu tambah jenis barang
Route::get('/jenis-barang-entry', [JenisBarangController::class, 'create'])->name('jenis-barang-entry');
//Routing post untuk melakukan action insert data jenis barang
Route::post('/jenis-barang-entry', [JenisBarangController::class,'store'])->name('jenis-barang-store');
//Routing post untuk melakukan action update data jenis barang
Route::post('/jenis-barang-update/{id}', [JenisBarangController::class, 'update'])->name('jenis-barang-update');
//Routing get juga dapat dilakukan untuk action delete
Route::get('/jenis-barang-delete/{id}',[JenisBarangController::class, 'destroy'])->name('jenis-barang-delete'); 


//routing untuk ke menu pelanggan
Route::get('/pelanggan', function () {
    return view('admin.pelanggan.pelanggan');
})->name('pelanggan');

// Routing untuk ke menu tambah pelanggan
Route::get('/pelanggan-entry', function () {
    return view('admin.pelanggan.pelanggan-entry');
})->name('pelanggan-entry');

// Routing untuk ke menu supplier
Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier');
// Routing untuk ke menu tambah supplier
Route::get('/supplier-entry', [SupplierController::class, 'create'])->name('supplier-entry');
//Routing post untuk melakukan action insert data supplier
Route::post('/supplier-entry', [SupplierController::class,'store'])->name('supplier-store');
//Routing post untuk melakukan action update data supplier
Route::post('/supplier-update/{id}', [SupplierController::class, 'update'])->name('supplier-update');
//Routing get juga dapat dilakukan untuk action delete
Route::get('/supplier-delete/{id}',[SupplierController::class, 'destroy'])->name('supplier-delete'); 


// Routing untuk ke menu stok barang
Route::get('/stok',[StokBarangController::class, 'index'])->name('stok');
// Routing untuk ke menu tambah stock
Route::get('/stok-entry', [StokBarangController::class, 'create'])->name('stok-entry');
//Routing post untuk melakukan action insert data stok
Route::post('/stok-entry', [StokBarangController::class,'store'])->name('stok-store');
//Routing post untuk melakukan action update data stok
Route::post('/stok-update/{id}', [StokBarangController::class, 'update'])->name('stok-update');
//Routing get juga dapat dilakukan untuk action delete
Route::get('/stok-delete/{id}',[StokBarangController::class, 'destroy'])->name('stok-delete'); 

// Routing untuk ke menu gudang
Route::get('/gudang', [GudangController::class, 'index'])->name('gudang');
// Routing untuk ke menu tambah gudang
Route::get('/gudang-entry', [GudangController::class, 'create'])->name('gudang-entry');
//Routing post untuk melakukan action insert data gudang
Route::post('/gudang-entry', [GudangController::class,'store'])->name('gudang-store');
//Routing post untuk melakukan action update data gudang
Route::post('/gudang-update/{id}', [GudangController::class, 'update'])->name('gudang-update');
//Routing get juga dapat dilakukan untuk action delete
Route::get('/gudang-delete/{id}',[GudangController::class, 'destroy'])->name('gudang-delete'); 

// Routing untuk ke menu pegawai
Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai');
// Routing untuk ke menu tambah pegawai
Route::get('/pegawai-entry', [PegawaiController::class, 'create'])->name('pegawai-entry');
//Routing post untuk melakukan action insert data pegawai
Route::post('/pegawai-entry', [PegawaiController::class,'store'])->name('pegawai-store');
//Routing post untuk melakukan action update data pegawai
Route::post('/pegawai-update/{id}', [PegawaiController::class, 'update'])->name('pegawai-update');
//Routing get juga dapat dilakukan untuk action delete
Route::get('/pegawai-delete/{id}',[PegawaiController::class, 'destroy'])->name('pegawai-delete'); 

// Routing untuk ke menu pengiriman
Route::get('/pengiriman', [PengirimanController::class, 'index'])->name('pengiriman');
// Routing untuk ke menu tambah pengiriman
Route::get('/pengiriman-entry', [PengirimanController::class, 'create'])->name('pengiriman-entry');
//Routing post untuk melakukan action insert data pengiriman
Route::post('/pengiriman-entry', [PengirimanController::class,'store'])->name('pengiriman-store');
//Routing post untuk melakukan action update data pengiriman
Route::post('/pengiriman-update/{id}', [PengirimanController::class, 'update'])->name('pengiriman-update');
//Routing get juga dapat dilakukan untuk action delete
Route::get('/pengiriman-delete/{id}',[PengirimanController::class, 'destroy'])->name('pengiriman-delete'); 
