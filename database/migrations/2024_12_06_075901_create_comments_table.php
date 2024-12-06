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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('blog_id'); // Bloga aid ID
            $table->string('name'); // İstifadəçinin adı
            $table->string('email'); // İstifadəçinin emaili
            $table->text('comment'); // Şərhin özü
            $table->timestamps();

            // Xarici açar əlaqəsi
            $table->foreign('blog_id')->references('id')->on('blogs')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
