<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkshopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workshops', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('speaker_id')->nullable();
            $table->enum('type', ['canela', 'crema'])->default('canela');
            $table->string('title')->nullable();
            $table->text('intro')->nullable();
            $table->text('learn')->nullable();
            $table->text('requirements')->nullable();
            $table->text('companies')->nullable();
            $table->text('careers')->nullable();
            $table->text('plan')->nullable();
            $table->text('resources')->nullable();
            $table->text('materials')->nullable();
            $table->string('date')->nullable();
            $table->string('time')->nullable();
            $table->text('topics')->nullable();
            $table->text('target')->nullable();
            $table->string('attendees')->nullable();
            $table->text('included')->nullable();
            $table->integer('price')->nullable();
            $table->boolean('published')->default(true);
            $table->integer('order')->default(9999);
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('workshops');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
