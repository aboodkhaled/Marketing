<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomarItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customar_items', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('item id');
            $table->bigInteger('customar_id')->unsigned();
            $table->foreign('customar_id')->references('id')->on('customars')->onDelete('cascade');
          
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
        Schema::dropIfExists('customar_items');
    }
}
