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
        /**
         * if kader is used by pemeriksaaans table, but we like forced those
         * kader, we simply set kader status, but not delete entire data,
         * else scenario like in penduduk is deleted, all data related kader
         * will deleted, so you must careful in logic if penduduks data is
         * deleted
         */
        Schema::create('kaders', function (Blueprint $table) {
            $table->id('kader_id');
            $table->unsignedBigInteger('user_id')->index()->nullable();
            $table->foreign('user_id')->references('user_id')->on('users')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('penduduk_id')->constrained('penduduks', 'penduduk_id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->enum('status', ['aktif', 'tidak aktif'])->default('aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kaders');
    }
};
