<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreTemplateconfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_templateconfigs', function (Blueprint $table) {
            $table->unsignedBigInteger('store_id');
            $table->unsignedBigInteger('templateconfig_id');
            $table->unique(['store_id','templateconfig_id']);
            $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');
            $table->foreign('templateconfig_id')->references('id')->on('templateconfigs')->onDelete('cascade');
            $table->timestamps();
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
        Schema::dropIfExists('store_templateconfigs');
    }
}
