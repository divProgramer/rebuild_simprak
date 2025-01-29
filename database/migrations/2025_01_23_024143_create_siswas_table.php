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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('instansi_id')->nullable();
            $table->unsignedBigInteger('jurusan_id');
            $table->unsignedBigInteger('sekolah_id');
            $table->unsignedBigInteger('guru_id')->nullable();
            $table->unsignedBigInteger('kelompok_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('instansi_id')->references('id')->on('instansis');
            $table->foreign('jurusan_id')->references('id')->on('jurusans');
            $table->foreign('sekolah_id')->references('id')->on('sekolahs');
            $table->foreign('guru_id')->references('id')->on('gurus');
            $table->foreign('kelompok_id')->references('id')->on('kelompoks');
            $table->string('nis', 20);
            $table->string('nama', 100);
            $table->string('no_hp', 20);
            $table->text('alamat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
