<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('ratings', function (Blueprint $table) {
            $table->unsignedBigInteger('review_id')->nullable()->after('product_id'); // review_id sütununu əlavə et
            $table->foreign('review_id')->references('id')->on('reviews')->onDelete('cascade'); // Xarici açar təyin et
        });
    }
    
    public function down()
    {
        Schema::table('ratings', function (Blueprint $table) {
            $table->dropForeign(['review_id']); // Xarici açarı sil
            $table->dropColumn('review_id'); // review_id sütununu sil
        });
    }
    
};
