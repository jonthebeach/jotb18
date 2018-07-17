<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDay1Day2Day3ColumnsToWorkshopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('workshops', function (Blueprint $table) {
            $table->text('day1')->after('price')->nullable();
            $table->text('day2')->after('price')->nullable();
            $table->text('day3')->after('price')->nullable();
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
            if (Schema::hasColumn('workshops', 'day1')) {
                $table->dropColumn('day1');
            }
            if (Schema::hasColumn('workshops', 'day2')) {
                $table->dropColumn('day2');
            }
            if (Schema::hasColumn('workshops', 'day3')) {
                $table->dropColumn('day3');
            }
        });
    }
}
