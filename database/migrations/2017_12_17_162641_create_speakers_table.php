<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpeakersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('speakers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->text('twitter')->nullable();
            $table->text('position')->nullable();
            $table->text('company')->nullable();
            $table->text('description')->nullable();
            $table->text('imagePath')->nullable();
            $table->boolean('hype')->default(false);
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('speakers');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
