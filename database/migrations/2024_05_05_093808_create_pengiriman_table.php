<?php

use App\Models\Gudang;
use App\Models\Barang;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengiriman', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pengiriman');
            $table->foreignIdFor(Gudang::class);
            $table->foreignIdFor(Barang::class);
            $table->integer('jumlah_barang');
            $table->date('tanggal');            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengiriman');
    }
};
