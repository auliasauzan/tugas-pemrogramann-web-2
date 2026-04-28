<?php

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
        Schema::create('skincares', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama Produk
        $table->string('brand'); // Merek
        $table->string('type'); // Jenis Produk (Cleanser, Toner, dll)
        $table->string('skin_type'); // Jenis Kulit (Kering, Berminyak, dll)
        $table->date('expired_date'); // Tanggal Kadaluarsa
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skincares');
    }
};
