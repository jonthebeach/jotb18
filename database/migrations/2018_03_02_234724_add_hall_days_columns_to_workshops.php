<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHallDaysColumnsToWorkshops extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('workshops', function (Blueprint $table) {
            $table->string('hall')->after('price')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('workshops', function (Blueprint $table) {
            if (Schema::hasColumn('workshops', 'hall')) {
                $table->dropColumn('hall');
            }
        });
    }
}
