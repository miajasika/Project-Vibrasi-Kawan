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
        Schema::create('jadwal_praktik', function (Blueprint $table) {
            $table->id('jadwal_id');
            $table->unsignedBigInteger('psikolog_id');
            $table->date('tanggal');
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->enum('status', ['tersedia', 'terbooking'])->default('tersedia');
            $table->timestamps('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrent()->useCurrentOnUpdate();
            $table->foreign('psikolog_id', 'fk_jadwal_psikolog')
            ->references('psikolog_id')->on('psikolog')
            ->restrictOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_praktik');
    }
};
