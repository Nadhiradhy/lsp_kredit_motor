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
        Schema::create('pengiriman', function (Blueprint $table) {
            $table->id();

            $table->string('invoice');
            $table->dateTime('tgl_kirim')->nullable();
            $table->dateTime('tgl_terima')->nullable();

            $table->enum('status_kirim', ['Sedang Dikirim','Tiba Di Tujuan']);

            $table->string('nama_kurir', 30);
            $table->string('telepon_kurir', 15);
            $table->string('bukti_foto')->nullable();
            $table->text('keterangan')->nullable();

            $table->foreignId('id_kredit')->constrained('kredit')->cascadeOnDelete();

            $table->timestamps();
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
