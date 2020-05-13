<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poems', function (Blueprint $table) {
            $table->bigIncrements('id')->unique();
            $table->string('title_hy', 100);
            $table->text('text_hy');
            $table->text('desc_hy');
            $table->text('keywords_hy');
            $table->string('alias_hy', 100)->unique();
            $table->string('title_ru', 100);
            $table->text('text_ru');
            $table->text('desc_ru');
            $table->text('keywords_ru');
            $table->string('alias_ru', 100)->unique();
            $table->string('title_en', 100);
            $table->text('text_en');
            $table->text('desc_en');
            $table->text('keywords_en');
            $table->string('alias_en', 100)->unique();


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
        Schema::dropIfExists('poems');
    }
}
