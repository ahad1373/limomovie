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
        Schema::create('serials', function (Blueprint $table) {
            $table->id();
            $table->string('original_title');
            $table->string('img');
            $table->string('persian_title');
            $table->string('age_category');
            $table->string('country');
            $table->string('language');
            $table->string('time');
            $table->text('synopsis');
            $table->string('broadcast_network');
            $table->string('imdb');
            $table->string('directors');
            $table->integer('serial_id');
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
        Schema::dropIfExists('serials');
    }
};
