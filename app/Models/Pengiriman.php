<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    use HasFactory;

    //mendisable field timestamp pada database
    public $timestamps = false;

      //Menunjukkan table yang ada di database yaitu pengiriman
    protected $table = "pengiriman";
    
    // fillable -> menentukan kolom mana yang diizinkan diisi secara massal
    protected $fillable = ['kode_pengiriman', 'gudang_id','barang_id','jumlah_barang','tanggal'];

    public function gudang() {
        return $this->belongsTo(Gudang::class,'gudang_id');
    }

    public function barang() {
        return $this->belongsTo(Barang::class,'barang_id');
    }
}
