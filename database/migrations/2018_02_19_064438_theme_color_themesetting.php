<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ThemeColorThemesetting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('color_themesetting', function (Blueprint $table) {
            $table->unsignedInteger('color_id');
            $table->unsignedInteger('themesetting_id');
            $table->primary(['color_id', 'themesetting_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('color_themesetting');
    }
}
