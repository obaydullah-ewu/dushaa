<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeaturedGalleryVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('featured_gallery_videos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('video');
            $table->tinyInteger('status')->comment('active=1, inactive=0')->default(1);
            $table->tinyInteger('serial')->nullable();
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
        Schema::dropIfExists('featured_gallery_videos');
    }
}
