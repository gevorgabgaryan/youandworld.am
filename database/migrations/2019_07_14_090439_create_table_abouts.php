<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAbouts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_hy', 100);
            $table->text('desc_hy');
            $table->text('text_hy');
            $table->text('longtext_hy');
            $table->string('alias_hy', 100)->unique();
            $table->string('name_ru', 100);
            $table->text('desc_ru');
            $table->text('text_ru');
            $table->text('longtext_ru');
            $table->string('alias_ru', 100)->unique();
            $table->string('name_en', 100);
            $table->text('desc_en');
            $table->text('text_en');
            $table->text('longtext_en');
            $table->string('alias_en', 100)->unique();


            $table->string('link');
            $table->string('img');
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
        Schema::dropIfExists('abouts');
    }
}
