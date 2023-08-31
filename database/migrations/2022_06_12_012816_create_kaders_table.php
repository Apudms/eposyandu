<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kaders', function (Blueprint $table) {
            $table->id();
            $table->text('kader_id');
            $table->unsignedBigInteger('dusun_id');
            $table->string('namaKader');
            $table->enum('jabatan', ['Ketua', 'Sekretaris', 'Bendahara', 'Anggota'])->default('Anggota');
            $table->string('tempatLahir');
            $table->date('tanggalLahir');
            $table->string('noTelp');
            $table->string('alamat');
            $table->string('foto')->nullable();
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
        Schema::dropIfExists('kaders');
    }
}
