<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('uid');
            $table->foreignId('basket_id')->constrained('baskets')->onDelete('cascade');
            $table->integer('status');
            $table->string('name');
            $table->string('mobile_number');
            $table->text('address_line');
            $table->text('area');
            $table->foreignId('city_id')->constrained('cities')->onDelete('cascade'); 
            $table->string('pin_code');
            $table->boolean('is_default')->default(false);
            $table->decimal('total', 10, 2); 
            $table->string('payment_type'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
