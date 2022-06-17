<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartOrderstatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_orderstatus', function (Blueprint $table) {
            $table->unsignedBigInteger('cart_id');
            $table->unsignedBigInteger('orderstatus_id');
            $table->unique(['cart_id','orderstatus_id']);
            $table->foreign('cart_id')->references('id')->on('carts')->onDelete('cascade');
            $table->foreign('orderstatus_id')->references('id')->on('orderstatus')->onDelete('cascade');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_orderstatus');
    }
}
