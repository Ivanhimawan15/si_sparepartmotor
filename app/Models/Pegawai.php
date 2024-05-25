<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

     //Menunjukkan table yang ada di database yaitu pegawi
     protected $table = "pegawai";

     //mendisable field timestamp pada database
     public $timestamps = false;
 
     // fillable -> menentukan kolom mana yang diizinkan diisi secara massal
     protected $fillable = ['kode_pegawai','nama_pegawai','alamat','no_telp','jabatan'];
}
