<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ThemeBackgroundThemesetting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('background_themesetting', function (Blueprint $table) {
            $table->unsignedInteger('background_id');
            $table->unsignedInteger('themesetting_id');
            $table->primary(['background_id', 'themesetting_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('background_themesetting');
    }
}
