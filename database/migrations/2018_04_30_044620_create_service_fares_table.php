<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceFaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_fares', function (Blueprint $table) {
            $table->increments('id');
            $table->string('currency')->nullable();
            $table->string('period')->nullable();
            $table->integer('fee')->nullable();
            $table->integer('show_price')->default(0);
            $table->string('message')->default('contact us');
            $table->unsignedInteger('service_id');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
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
        Schema::dropIfExists('service_fares');
    }
}
