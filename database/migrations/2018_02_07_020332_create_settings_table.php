<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('tagline');
            $table->text('address');
            $table->string('phone');
            $table->string('email');
            $table->text('about');
            $table->text('privacy_policy');
            $table->unsignedInteger('currency_id');
            $table->unsignedInteger('themesetting_id')->default(1);
            $table->unsignedInteger('background_id')->nullable();
            $table->unsignedInteger('color_id')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
