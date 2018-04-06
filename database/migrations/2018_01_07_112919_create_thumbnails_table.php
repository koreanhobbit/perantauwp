<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThumbnailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('thumbnails', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('location');
            $table->integer('size');
            $table->string('type');
            $table->unsignedInteger('image_id');
            $table->foreign('image_id')->references('id')->on('images')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('thumbnails');
        Schema::enableForeignKeyConstraints();
    }
}
