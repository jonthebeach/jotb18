<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTalkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('talk', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->text('intro')->nullable();
            $table->text('description')->nullable();
            $table->integer('topic_id')->nullable();
            $table->text('level')->nullable()->default(null);
            $table->boolean('published')->default(true);
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
        Schema::dropIfExists('talk');
    }
}
