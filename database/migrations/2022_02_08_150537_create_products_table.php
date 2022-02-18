<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('subcategory_id')->nullable();
            $table->integer('manufacturer_id')->nullable();
            $table->string('name')->nullable();
            $table->string('code')->unique();
            $table->string('slug')->unique();
            $table->text('title')->nullable();
            $table->text('description')->nullable();
            $table->text('small_description')->nullable();
            $table->text('image')->nullable();
            $table->integer('price')->default(0);
            $table->integer('old_price')->default(0);
            $table->integer('status')->default(0);
            $table->integer('new')->default(0);
            $table->integer('sale')->default(0);
            $table->integer('hit')->default(0);
            $table->integer('recommend')->default(0);
            $table->timestamps();
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
