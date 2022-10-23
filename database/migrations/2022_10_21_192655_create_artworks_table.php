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
        Schema::create('artworks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contact_id');
            $table->string('title')->nullable();
            $table->string('size')->nullable();
            $table->string('category')->nullable();
            $table->string('file')->nullable();
            $table->mediumText('artist_notes')->nullable();
            $table->integer('price')->nullable();
            $table->integer('is_live')->default(1);
            $table->integer('is_featured')->default(0);
            $table->integer('on_sale')->default(0);
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
        Schema::dropIfExists('artworks');
    }
};
