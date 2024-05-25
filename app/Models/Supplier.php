<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    //Menunjukkan table yang ada di database yaitu jenis_barang
    protected $table = "supplier";

    //mendisable field timestamp pada database
    public $timestamps = false;

    // fillable -> menentukan kolom mana yang diizinkan diisi secara massal
    protected $fillable = ['kode_supplier','nama_supplier','alamat','no_telp'];
}
