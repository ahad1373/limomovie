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
        Schema::create('list_link_pagination_videos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paginate_id');
            $table->foreign('paginate_id')->references('id')->on('pagination_videos')->onDelete('cascade');
            $table->string('link_video_page');
            $table->string('image');
            $table->string('title');
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
        Schema::dropIfExists('list_link_pagination_videos');
    }
};
