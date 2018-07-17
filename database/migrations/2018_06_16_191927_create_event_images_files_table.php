<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventImagesFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_images_files', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('event_images_id')->unsigned()->index();
            $table->string('imagePath')->nullable();
            $table->string('thumbnailPath')->nullable();
            $table->boolean('published')->default(true);
            $table->integer('order')->default(9999);
            $table->timestamps();

            $table->foreign('event_images_id')->references('id')->on('event_images')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_images_files');
    }
}
