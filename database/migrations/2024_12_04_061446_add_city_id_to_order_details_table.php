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
        Schema::table('order_details', function (Blueprint $table) {
            $table->unsignedBigInteger('city_id')->nullable(); // city_id sahəsini əlavə edirik
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade'); // əlaqəni qururuq
        });
    }
    
    public function down()
    {
        Schema::table('order_details', function (Blueprint $table) {
            $table->dropForeign(['city_id']);
            $table->dropColumn('city_id');
        });
    }
    
};
