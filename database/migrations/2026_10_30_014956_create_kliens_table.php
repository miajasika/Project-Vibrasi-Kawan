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
        Schema::create('kliens', function (Blueprint $table) {
            $table->id('klien_id');
            $table->unsignedBigInteger('user_id')->unique();
            $table->foreign('user_id', 'fk_klien_user')
            ->references('user_id')->on('users')
            ->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('klien');
    }
};
