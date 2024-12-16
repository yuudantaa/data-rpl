<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenggajianTable extends Migration
{
    public function up()
    {
        Schema::create('penggajian', function (Blueprint $table) {
            $table->id();
            $table->string('nama_karyawan');
            $table->string('perusahaan');
            $table->decimal('gaji_pokok', 15, 2);
            $table->decimal('bonus', 15, 2)->nullable();
            $table->decimal('total_gaji', 15, 2);
            $table->string('status');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('penggajian');
    }
}
