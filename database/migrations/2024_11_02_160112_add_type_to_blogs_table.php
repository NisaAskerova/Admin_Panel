<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeToBlogsTable extends Migration
{
    public function up()
    {
        Schema::table('blog_mains', function (Blueprint $table) {
            $table->string('type')->nullable(); // 'type' sütununu əlavə edirik
        });
    }

    public function down()
    {
        Schema::table('blog_mains', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
}
