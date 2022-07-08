<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id')->from(10);
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->text('title')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        DB::table('categories')->insert(['id' => 9, 'name' => 'whatever', 'slug' => 'whatever',]);
        DB::table('categories')->where('id', 9)->delete();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
