<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('user')->unique();
            $table->string('dni')->unique();
            $table->string('email')->unique();
            $table->string('ruc')->default(0);
            $table->string('company')->default('');
            $table->string('address')->default('');
            $table->string('phone')->default(0);
            $table->string('celular')->default(0);
            $table->string('num_account_soles')->default(0);
            $table->string('num_account_dolar')->default(0);
            $table->string('bank_soles')->default(0);
            $table->string('bank_dolar')->default(0);
            $table->string('inter_soles')->default(0);
            $table->string('inter_dolar')->default(0);
            $table->string('password');
            $table->rememberToken();/**/
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
        Schema::dropIfExists('users');
    }
}
