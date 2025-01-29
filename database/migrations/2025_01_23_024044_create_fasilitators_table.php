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
        Schema::create('fasilitators', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('kelompok_id');
            $table->unsignedBigInteger('instansi_id');
            $table->foreign('instansi_id')->references('id')->on('instansis');
            $table->foreign('kelompok_id')->references('id')->on('kelompoks');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('nim', 20);
            $table->string('nama', 100);
            $table->string('no_hp', 100);
            $table->text('alamat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fasilitators');
    }
};
