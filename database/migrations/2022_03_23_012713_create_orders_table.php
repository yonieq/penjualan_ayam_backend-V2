<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('invoice');
            $table->unsignedBigInteger('user_id');
            $table->string('no_pengantar');
            $table->string('nama_pengantar');
            $table->unsignedBigInteger('status_order_id');
            $table->string('metode_pembayaran');
            $table->string('ongkir')->nullable();
            $table->string('biaya_cod')->nullable();
            $table->string('subtotal');
            $table->text('pesan')->nullable();
            $table->string('no_hp');
            $table->string('bukti_pembayaran')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
