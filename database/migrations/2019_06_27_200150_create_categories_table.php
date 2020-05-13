<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Categories', function (Blueprint $table) {
            $table->bigIncrements('id')->unique();
            $table->string('title_hy', 100);
            $table->string('alias_hy')->unique();
            $table->string('title_ru', 100);
            $table->string('alias_ru')->unique();
            $table->string('title_en', 100);
            $table->string('alias_en')->unique();
            $table->integer('parent_id')->defualt(0);
            
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
        Schema::dropIfExists('Categories');
    }
}
