<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_options', function (Blueprint $table) {
            $table->increments('id');
            $table->string('label');
            $table->string('value');
            $table->unsignedInteger('form_item_id');
            $table->foreign('form_item_id')->references('id')->on('form_items')->onDelete('cascade');
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
        Schema::dropIfExists('form_options');
    }
}
