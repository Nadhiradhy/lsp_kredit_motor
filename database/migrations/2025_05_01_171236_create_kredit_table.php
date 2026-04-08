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
        Schema::create('kredit', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_pengajuan_kredit')->constrained('pengajuan_kredit')->cascadeOnDelete();
            $table->foreignId('id_metode_bayar')->constrained('metode_bayar');

            $table->date('tgl_mulai_kredit');
            $table->date('tgl_selesai_kredit');

            $table->double('sisa_kredit');

            $table->enum('status_kredit', ['Dicicil','Macet','Lunas']);
            $table->string('keterangan_status_kredit')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kredit');
    }
};
