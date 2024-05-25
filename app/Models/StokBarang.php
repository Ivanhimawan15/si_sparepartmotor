<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StokBarang extends Model
{
    use HasFactory; 
    //Menunjukkan table yang ada di database yaitu stok_barang
    protected $table = "stok_barang";

    //mendisable field timestamp pada database
    public $timestamps = false;

    // fillable -> menentukan kolom mana yang diizinkan diisi secara massal
    protected $fillable = ['kode_stok','barang_id','jumlah_stok'];


    public function barang() {
        return $this->belongsTo(Barang::class,'barang_id');
    }

    public function gudang() {
        return $this->hasOne(Gudang::class,'stok_barang_id');
    }
}
