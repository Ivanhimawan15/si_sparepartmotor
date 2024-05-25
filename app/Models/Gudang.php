<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gudang extends Model
{
    use HasFactory;

     //mendisable field timestamp pada database
     public $timestamps = false;

     //Menunjukkan table yang ada di database yaitu barang
   protected $table = "gudang";
   
   // fillable -> menentukan kolom mana yang diizinkan diisi secara massal
   protected $fillable = ['kode_gudang', 'stok_barang_id','barang_id','tanggal'];


   //Function ini menandakan bahwa memiliki relasi dengan table barang melalui barang_id 
    public function barang() {
        return $this->belongsTo(Barang::class,'barang_id');
    }

    public function stok() {
        return $this->belongsTo(StokBarang::class,'stok_barang_id');
    }

}
