<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePivotSpeakerWorkshop extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('speaker_workshop', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('speaker_id')->unsigned()->nullable();
            $table->integer('workshop_id')->unsigned()->nullable();

            $table->foreign('speaker_id')->references('id')->on('speakers')->onDelete('set null');
            $table->foreign('workshop_id')->references('id')->on('workshops')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('speaker_workshop');
    }
}
