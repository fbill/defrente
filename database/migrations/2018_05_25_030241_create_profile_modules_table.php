<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_modules', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('module_id');
            $table->foreign('module_id')->references('id')->on('modules');
            $table->unsignedInteger('profile_id');
            $table->foreign('profile_id')->references('id')->on('profiles');
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
        Schema::dropIfExists('profile_modules');
    }
}
