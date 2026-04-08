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
        Schema::create('pengajuan_kredit', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_pengajuan_kredit');

            $table->foreignId('id_pelanggan')->constrained('pelanggan')->cascadeOnDelete();
            $table->foreignId('id_motor')->constrained('motor')->cascadeOnDelete();
            $table->foreignId('id_jenis_cicilan')->constrained('jenis_cicilan');
            $table->foreignId('id_asuransi')->constrained('asuransi');

            $table->integer('harga_cash');
            $table->integer('dp');
            $table->double('harga_kredit');
            $table->double('biaya_asuransi_perbulan');
            $table->double('cicilan_perbulan');

            $table->string('url_kk')->nullable();
            $table->string('url_ktp')->nullable();
            $table->string('url_npwp')->nullable();
            $table->string('url_slip_gaji')->nullable();
            $table->string('url_foto')->nullable();

            $table->enum('status_pengajuan', [
                'Menunggu Konfirmasi','Diproses','Dibatalkan Pembeli',
                'Dibatalkan Penjual','Bermasalah','Diterima'
            ]);

            $table->string('keterangan_status_pengajuan')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_kredit');
    }
};
