<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUjianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ujian', function (Blueprint $table) {
            $table->id();
            $table->integer('jadwal_id')->nullable();
            $table->string('judul')->nullable();
            $table->string('type')->nullable();
            $table->string('file_or_link')->nullable();
            $table->string('description')->nullable();
            $table->string('pengumpulan')->nullable();
            $table->string('tanggal')->nullable();
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
        Schema::dropIfExists('ujian');
    }
}
