<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Suppliers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('supplier_name', 50)->nullable();
            $table->string('address', 50)->nullable();
            $table->string('email', 128)->nullable();
            $table->string('fax', 18)->nullable();
            $table->string('tel_num', 18)->nullable();
            $table->boolean('status', 18)->default(0);
            $table->datetime('deleted_at')->nullable();
            $table->timestamps()->default('CURRENT_TIMESTAMP');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suppliers');
    }
}
