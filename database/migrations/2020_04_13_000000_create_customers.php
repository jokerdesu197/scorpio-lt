<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('login_id', 18)->unique();
            $table->string('tel_num', 18)->nullable();
            $table->string('email', 254)->unique();
            $table->datetime('birth')->nullable();
            $table->tinyInteger('sex')->nullable();
            $table->string('address', 50)->nullable();
            $table->string('password', 18)->bcryt();
            $table->foreign('role_id')->references('id')->on('roles');
            $table->foreign('creator_id')->references('id')->on('users')->nullable();
            $table->datetime('login_date')->nullable();
            $table->boolean('status')->default(0);
            $table->rememberToken()->nullable();
            $table->timestamps();
            $table->datetime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
