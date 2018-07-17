<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIshomeToSpeakersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('speakers', function (Blueprint $table) {
            $table->boolean('home')->after('hype')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('speakers', function (Blueprint $table) {
            if (Schema::hasColumn('speakers', 'home')) {
                $table->dropColumn('home');
            }
        });
    }
}
