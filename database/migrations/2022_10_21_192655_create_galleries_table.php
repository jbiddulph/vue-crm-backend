<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('size')->nullable();
            $table->string('category')->nullable();
            $table->string('file')->nullable();
            $table->mediumText('artistNotes')->nullable();
            $table->integer('price')->nullable();
            $table->integer('isLive')->default(1);
            $table->integer('isFeatured')->default(0);
            $table->integer('onSale')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('galleries');
    }
};
