<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiUlanganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_ulangan', function (Blueprint $table) {
            $table->id();
            $table->integer('ulangan_id')->nullable();
            $table->string('nilai')->nullable();
            $table->string('komentar_guru')->nullable();
            $table->integer('siswa_id')->nullable();
            $table->integer('jadwal_id')->nullable();
            $table->string('jawaban_siswa')->nullable();
            $table->string('tanggal')->nullable();
            $table->integer('guru_id')->nullable();
            $table->string('pertemuan')->nullable();
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
        Schema::dropIfExists('nilai_ulangan');
    }
}
