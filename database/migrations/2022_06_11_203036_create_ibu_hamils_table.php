<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIbuHamilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ibu_hamils', function (Blueprint $table) {
            $table->id();
            $table->text('ibuHamil_id');
            $table->unsignedBigInteger('dusun_id');
            $table->string('namaIbuHamil');
            $table->string('tempatLahir');
            $table->date('tanggalLahir');
            $table->string('namaSuami');
            $table->date('tanggalDaftar');
            $table->string('noTelp');
            $table->string('alamat');
            $table->timestamps();

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
        Schema::dropIfExists('ibu_hamils');
    }
}
