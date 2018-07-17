<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPriceDescriptionMaxPackToSponsorsGroups extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sponsors_groups', function (Blueprint $table) {
            $table->integer('price')->after('title')->nullable();
            $table->boolean('pack')->after('title')->default(false)->nullable();
            $table->tinyInteger('max')->after('title')->nullable();
            $table->text('description')->after('title')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sponsors_groups', function (Blueprint $table) {
            if (Schema::hasColumn('sponsors_groups', 'max')) {
                $table->dropColumn('max');
            }
            if (Schema::hasColumn('sponsors_groups', 'description')) {
                $table->dropColumn('description');
            }
            if (Schema::hasColumn('sponsors_groups', 'price')) {
                $table->dropColumn('price');
            }
            if (Schema::hasColumn('sponsors_groups', 'pack')) {
                $table->dropColumn('pack');
            }
        });
    }
}
