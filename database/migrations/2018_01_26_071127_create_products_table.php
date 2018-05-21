<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->decimal('old_price', 65, 0)->nullable();
            $table->decimal('price', 65, 0);
            $table->boolean('is_sale')->default(0);
            $table->decimal('sale_price',65 , 0)->nullable();
            $table->dateTime('start_sale')->nullable();
            $table->dateTime('end_sale')->nullable();
            $table->text('description');
            $table->text('summary');
            $table->boolean('is_published')->default(0);
            $table->integer('product_category_id')->unsigned()->default(1);
            $table->foreign('product_category_id')->references('id')->on('product_categories');
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
        Schema::dropIfExists('products');
        Schema::enableForeignKeyConstraints();
    }
}
