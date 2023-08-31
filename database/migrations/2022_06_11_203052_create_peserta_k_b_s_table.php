<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesertaKBSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peserta_k_b_s', function (Blueprint $table) {
            $table->id();
            $table->text('pesertaKB_id');
            $table->unsignedBigInteger('kontrasepsi_id');
            $table->unsignedBigInteger('dusun_id');
            $table->string('namaPeserta');
            $table->string('tempatLahir');
            $table->date('tanggalLahir');
            $table->string('namaPasangan');
            $table->date('tanggalDaftar');
            $table->string('noTelp');
            $table->string('alamat');
            $table->timestamps();

            $table->foreign('kontrasepsi_id')->references('id')->on('kontrasepsis')->onDelete('cascade');
            $table->foreign('dusun_id')->references('id')->on('dusuns')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peserta_k_b_s');
    }
}
