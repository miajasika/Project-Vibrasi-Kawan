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
        Schema::create('psikologs', function (Blueprint $table) {
            $table->id('psikolog_id');
            $table->unsignedBigInteger('user_id')->unique();
            $table->string('no_sipp', 50);
            $table->string('spesialisasi');
            $table->text('deskripsi')->nullable();
            $table->string('foto')->nullable();
            $table->foreign('user_id', 'fk_psikolog_user')
            ->references('user_id')->on('users')
            ->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('psikolog');
    }
};
