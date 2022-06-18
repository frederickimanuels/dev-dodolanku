<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemplateconfigImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('templateconfig_images', function (Blueprint $table) {
            $table->unsignedBigInteger('templateconfig_id');
            $table->unsignedBigInteger('image_id');
            $table->unique(['templateconfig_id','image_id']);
            $table->foreign('templateconfig_id')->references('id')->on('templateconfigs')->onDelete('cascade');
            $table->foreign('image_id')->references('id')->on('images')->onDelete('cascade');
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
        Schema::dropIfExists('templateconfig_images');
    }
}
