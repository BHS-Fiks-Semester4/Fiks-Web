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
        Schema::create('customer', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_jenis_customer');
            $table->string('nama_customer');
            $table->string('alamat_customer');
            $table->string('no_hp_customer');
            $table->foreign('id_jenis_customer')->references('id')->on('jenis_customer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer');
    }
};
