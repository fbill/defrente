<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeatingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seating', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('type_seat', ['mesa', 'butaca']);
            $table->unsignedInteger('sector_id');
            $table->foreign('sector_id')->references('id')->on('sectors');
            $table->boolean('status');
            $table->string('point');
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
        Schema::dropIfExists('seating');
    }
}
