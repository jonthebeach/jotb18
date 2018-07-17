<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAuthorToBlogItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blog_items', function (Blueprint $table) {
            $table->string('author')->after('published')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blog_items', function (Blueprint $table) {
            if (Schema::hasColumn('blog_items', 'author')) {
                $table->dropColumn('author');
            }
        });
    }
}
