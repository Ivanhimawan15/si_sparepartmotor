<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Function untuk membuat field dari database
    public function up(): void
    {
        Schema::create('jenis', function (Blueprint $table) {
            //membuat field id agar auto increment
            $table->id();
            //Membuat field kode_jenis_barang yang bertipe data string
            $table->string('kode_jenis_barang');
            //Membuat field jenis_barang yang bertipe data string
            $table->string('nama_jenis_barang');
            //Membuat field keterangan yang bertipe data string
            $table->string('keterangan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis');
    }
};
