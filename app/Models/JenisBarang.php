<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisBarang extends Model
{
    use HasFactory;
    
    //Menunjukkan table yang ada di database yaitu jenis_barang
    protected $table = "jenis";

    //mendisable field timestamp pada database
    public $timestamps = false;

    // fillable -> menentukan kolom mana yang diizinkan diisi secara massal
    protected $fillable = ['kode_jenis_barang','nama_jenis_barang','keterangan'];

    // function ini menandakan bahwa memiliki relasi dengan table barang
    // yang mana table barang memiliki field id_jenis yang ada di table jenis_barang
    public function barang() {
        return $this->hasOne(Barang::class,'jenis_barang_id');
    }
}
