<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('video_id');
            $table->string('original_title');
            $table->string('imdb');
            $table->string('persian_title');
            $table->string('age_category');
            $table->string('country');
            $table->string('time');
            $table->string('image');
            $table->string('language');
            $table->text('synopsis');
            $table->string('director');
            $table->longText('writer');
            $table->integer('category_id');
            $table->boolean('new')->default(0);
            $table->boolean('special')->default(0);
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('videos');
    }
};
