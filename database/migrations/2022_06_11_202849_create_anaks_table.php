<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anaks', function (Blueprint $table) {
            $table->id();
            $table->text('anak_id');
            $table->unsignedBigInteger('imunisasi_id');
            $table->unsignedBigInteger('dusun_id');
            $table->string('namaAnak');
            $table->string('tempatLahir');
            $table->date('tanggalLahir');
            $table->string('namaIbu');
            $table->string('namaAyah');
            $table->string('jenisKelamin');
            $table->string('alamat');
            $table->timestamps();

            $table->foreign('imunisasi_id')->references('id')->on('imunisasis')->onDelete('cascade');
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
        Schema::dropIfExists('anaks');
    }
}
