<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomarAttachesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customar_attaches', function (Blueprint $table) {
            $table->id();
            $table->string('name_file');
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
        Schema::dropIfExists('customar_attaches');
    }
}
