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
        Schema::create('detail_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transactionId');
            $table->unsignedBigInteger('collectionId');
            $table->date('tanggalKembali');
            $table->tinyInteger('status');
            $table->string('keterangan',100);   
            $table->timestamps();
            
            $table->foreign('transactionId')->references('id')->on('transactions');
            $table->foreign('collectionId')->references('id')->on('collections');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_transactions');
    }
};
