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
        Schema::create('jurnals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('instansi_id');
            $table->foreign('instansi_id')->references('id')->on('instansis');
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('sekolah_id');
            $table->text('catatan');
            $table->text('pencapaian_akhir')->nullable();
            $table->string('bukti', 100);
            $table->boolean('status');
            $table->timestamp('waktu_pulang')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jurnals');
    }
};
