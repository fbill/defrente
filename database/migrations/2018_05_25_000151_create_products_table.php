<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fullname');
            $table->string('slug')->unique();
            $table->string('description');
            $table->timestamp('date');
            $table->string('space');
            $table->string('flat');//plano de los sectores
            $table->string('address');
            $table->string('district');
            $table->string('region');
            $table->string('departament');
            $table->string('reference');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('web');
            $table->integer('tickets');
            $table->boolean('presale')->default(false);
            $table->string('text_presale')->default('');
            $table->dateTime('date_expiry')->default(now());
            $table->string('facebook')->default('');
            $table->string('instagram')->default('');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->mediumText('more_details');
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
        Schema::dropIfExists('products');
    }
}
