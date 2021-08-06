<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->double('price')->nullable();
            $table->string('floor_area')->nullable();
            $table->integer('bedrom')->nullable();
            $table->string('bathroom')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->text('description')->nullable();
            $table->string('featured_image')->nullable();
            $table->string('gallery_images')->nullable();
            $table->string('near_by_places')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('properties');
    }
}
