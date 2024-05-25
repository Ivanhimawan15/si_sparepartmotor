<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    //mendisable field timestamp pada database
    public $timestamps = false;

      //Menunjukkan table yang ada di database yaitu barang
    protected $table = "barang";
    
    // fillable -> menentukan kolom mana yang diizinkan diisi secara massal
    protected $fillable = ['kode_barang', 'jenis_barang_id','nama_barang','harga_jual','harga_beli'];


    //Function ini menandakan bahwa memiliki relasi dengan table jenis barang melalui id_jenis 
    public function jenisBarang() {
        return $this->belongsTo(JenisBarang::class,'jenis_barang_id');
    }

    public function stokBarang() {
      return $this->hasOne(StokBarang::class,'barang_id');
    }

    public function gudang() {
      return $this->hasOne(Gudang::class,'barang_id');
    }

    public function pengiriman() {
      return $this->hasOne(Pengiriman::class,'barang_id');
    }

}
