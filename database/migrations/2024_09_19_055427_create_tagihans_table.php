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
        Schema::create('tagihans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_terbit');
            $table->date('tanggal_lunas');
            $table->unsignedBigInteger('user_penerbit_id')->nullable();
            $table->unsignedBigInteger('user_melunasi_id')->nullable();

            $table->foreignId('siswa_id')->constrained()->onDelete('cascade')->onDelete('cascade');
            $table->foreignId('biaya_id')->constrained()->onDelete('cascade')->onDelete('cascade');
            $table->foreign('user_penerbit_id')->references('id')->on('users')->onDelete('cascade')->onDelete('cascade');
            $table->foreign('user_melunasi_id')->references('id')->on('users')->onDelete('cascade')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tagihans');
    }
};
