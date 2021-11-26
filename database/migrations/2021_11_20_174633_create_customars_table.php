<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('photo');
            $table->string('name_com');
            $table->integer('num_pt');
            $table->date('edate');
            $table->integer('num_se');
            $table->integer('num_ta');
            $table->integer('num_pz');
            $table->string('email')->unique();
            $table->string('mobile')->unique();
            $table->string('password');
            $table->bigInteger('city_id');
            $table->bigInteger('item_id');
            $table->boolean('active');
            
            $table->rememberToken();
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
        Schema::dropIfExists('customars');
    }
}
