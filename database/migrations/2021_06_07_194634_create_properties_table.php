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
            $table->text("description")->nullable();
            $table->double("price");
            $table->integer("showPrice")->default(1);
            $table->integer("roomsNumber")->nullable();
            $table->foreignId('userId')->constrained('users');
            $table->bigInteger('categoryId');
            $table->bigInteger('typeId');
            $table->string("locationDescription")->nullable();
            $table->string("contactInfo")->nullable();
            $table->string("image")->nullable();
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
