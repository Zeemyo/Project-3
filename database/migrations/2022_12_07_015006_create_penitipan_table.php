<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenitipanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penitipan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('id_kucing');
            $table->foreign('id_kucing')->references('id')->on('kucing')->onDelete('cascade');
            $table->string('tanggal_titip', 50);
            $table->string('tanggal_checkout', 50);
            $table->string('lama_titip', 50);
            $table->string('layanan', 50);
            $table->string('antar_jemput', 50);
            $table->string('status')->default('Not Approved');
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
        Schema::dropIfExists('penitipan');
    }
}
