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
        Schema::create('booking', function (Blueprint $table) {
            $table->id('booking_id');
            $table->unsignedBigInteger('klien_id');
            $table->unsignedBigInteger('jadwal_id');
            $table->enum('mode', ['online', 'offline']);
            $table->string('lokasi')->nullable();
            $table->string('link_meet')->nullable();
            $table->text('catatan_klien')->nullable();
            $table->enum('status', ['menunggu_verifikasi', 'diterima', 'selesai', 'ditolak'])
            ->default('menunggu_verifikasi');
            $table->text('alasan_penolakan')->nullable();
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrent()->useCurrentOnUpdate();
            $table->unique('jadwal_id', 'uq_booking_jadwal');
            $table->foreign('klien_id', 'fk_booking_klien')
                ->references('klien_id')->on('klien')
                ->restrictOnDelete()->cascadeOnUpdate();
            $table->foreign('jadwal_id', 'fk_booking_jadwal_praktik')
                ->references('jadwal_id')->on('jadwal_praktik')
                ->restrictOnDelete()->cascadeOnUpdate();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('booking');
    }
};
