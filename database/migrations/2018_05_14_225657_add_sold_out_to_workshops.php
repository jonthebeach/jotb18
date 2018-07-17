<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSoldOutToWorkshops extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('workshops', function (Blueprint $table) {
            $table->string('sold_out')->after('published')->default('0')->nullable();
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
            if (Schema::hasColumn('workshops', 'sold_out')) {
                $table->dropColumn('sold_out');
            }
        });
    }
}
