<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableBlogsCommentsAddIdPost extends Migration
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
                if (!Schema::hasColumn('blogs_comments', 'id_blog')) {
                    $table->integer('id_blog')->nullable();
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
                if (Schema::hasColumn('blogs_comments', 'id_blog')) {
                    $table->dropColumn('id_blog');
                }
            });
        }
    }
}
