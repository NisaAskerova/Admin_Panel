<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavoritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorites', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // İstifadəçi ilə əlaqə
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); // Məhsul ilə əlaqə
            $table->timestamps();
            
            $table->unique(['user_id', 'product_id']); // Bir istifadəçi yalnız bir məhsulu sevməlidir
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('favorites');
    }
}
