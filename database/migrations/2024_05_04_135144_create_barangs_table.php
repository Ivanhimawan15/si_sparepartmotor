<?php

use App\Models\JenisBarang;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Function untuk membuat field dari database
    public function up(): void
    {
        Schema::create('barang', function (Blueprint $table) {
            //membuat field id agar auto increment
            $table->id();
            //Membuat field kode_barang yang bertipe data string
            $table->string('kode_barang');
            //Membuat field id bertipe foreign key dari tabel jenis_barang 
            $table->foreignIdFor(JenisBarang::class);
            //Membuat field nama_barang yang bertipe data string
            $table->string('nama_barang');
            //Membuat field harga_jual yang bertipe data integer
            $table->integer('harga_jual');
            //Membuat field harga_beli yang bertipe data integer
            $table->integer('harga_beli');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
