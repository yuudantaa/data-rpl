<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CraetePenggajianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penggajian', function (Blueprint $table) {
            $table->id();
            $table->string('nama_karyawan');
            $table->string('perusahaan');
            $table->decimal('gaji_pokok', 15, 2);
            $table->decimal('bonus', 15, 2)->default(0);
            $table->decimal('total_gaji', 15, 2);
            $table->enum('status', ['Dibayar', 'Belum Dibayar'])->default('Belum Dibayar');
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
        //
    }
}
