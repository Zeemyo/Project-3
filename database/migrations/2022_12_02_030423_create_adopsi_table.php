<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdopsiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public function up()
    {
        Schema::create('adopsi', function (Blueprint $table) {
            $table->id();
            $table->string('image', 50);
            $table->string('nama_kucing', 50);
            $table->string('jenis_kucing', 50);
            $table->string('alasan_owner', 50);
            $table->string('medical_note', 240);
            $table->text('deskripsi');
            $table->string('kontak');
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
        Schema::dropIfExists('adopsi');
    }
}
