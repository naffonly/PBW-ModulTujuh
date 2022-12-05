<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userIdPetugas');
            $table->unsignedBigInteger('userIdPeminjam');
            $table->date('tanggalPinjam')->nullable();
            $table->date('tanggalSelesai')->nullable();
            $table->timestamps();

            $table->foreign('userIdPetugas')->references('id')->on('users');
            $table->foreign('userIdPeminjam')->references('id')->on('users');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
