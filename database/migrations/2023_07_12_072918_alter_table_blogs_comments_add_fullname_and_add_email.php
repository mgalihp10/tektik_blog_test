<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableBlogsCommentsAddFullnameAndAddEmail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('blogs_comments')) {
            Schema::table('blogs_comments', function (Blueprint $table) {
                if (!Schema::hasColumn('blogs_comments', 'fullname')) {
                    $table->string('fullname', 255)->nullable();
                    $table->string('email', 255)->nullable();
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('blogs_comments')) {
            Schema::table('blogs_comments', function (Blueprint $table) {
                if (Schema::hasColumn('blogs_comments', 'fullname')) {
                    $table->dropColumn('fullname');
                    $table->dropColumn('email');
                }
            });
        }
    }
}
