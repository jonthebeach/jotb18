<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableScheduleItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule_item', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('talk_id')->unsigned()->nullable();
            $table->string('day')->nullable()->default(null);
            $table->string('hall')->nullable()->default(null);
            $table->timestamp('start_time')->nullable();
            $table->timestamp('end_time')->nullable();
            $table->boolean('break')->default(false);
            $table->string('break_message')->nullable();
            $table->boolean('published')->default(true);
            $table->timestamps();

            $table->foreign('talk_id')->references('id')->on('talk')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedule_item');
    }
}
