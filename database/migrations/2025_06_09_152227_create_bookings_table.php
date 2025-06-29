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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('nama');
            $table->string('email');
            $table->string('no_hp');
            $table->foreignId('layanan_id')->constrained('layanans')->onDelete('cascade');
            $table->foreignId('tambahan_id')->constrained('tambahans')->onDelete('cascade');
            $table->date('tgl_acara');
            $table->string('alamat');
            $table->integer('total_harga');
            $table->enum('status', ['menunggu', 'noted', 'DP', 'lunas', 'batal'])->default('pending');
            $table->string('bukti_dp')->nullable();
            $table->string('bukti_pelunasan')->nullable();
            $table->integer('jumlah_dp')->nullable();
            $table->integer('jumlah_pelunasan')->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
