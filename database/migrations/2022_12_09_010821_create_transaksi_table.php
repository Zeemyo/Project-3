<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->foreign('id_penitipan')->references('id')->on('penitipan')->onDelete('cascade');
            $table->unsignedBigInteger('id_penitipan');
            $table->string('midtrans_transaction_id');
            $table->string('midtrans_order_id');
            $table->unsignedBigInteger('midtrans_va_number');
            $table->string('total', 50);
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
        Schema::dropIfExists('transaksi');
    }
}
