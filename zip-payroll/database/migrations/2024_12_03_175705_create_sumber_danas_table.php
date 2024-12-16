<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSumberDanasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sumber_danas', function (Blueprint $table) {
            $table->bigIncrements('id'); // Ganti id() dengan bigIncrements('id')
            $table->string('nama_sumber'); // Contoh kolom
            $table->string('deskripsi'); // Contoh kolom
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
        Schema::dropIfExists('sumber_danas');
    }
}

