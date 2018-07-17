<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMessageToScheduleItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('schedule_item', function (Blueprint $table) {
            $table->string('message')->after('break_message')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('schedule_item', function (Blueprint $table) {
            if (Schema::hasColumn('schedule_item', 'message')) {
                $table->dropColumn('message');
            }
        });
    }
}
