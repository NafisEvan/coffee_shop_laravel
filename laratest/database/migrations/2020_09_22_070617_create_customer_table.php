<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('name');
          $table->string('username')->unique();
          $table->string('password');
          $table->string('phone');
          $table->string('email');
          $table->string('address');
          $table->string('gender');
          $table->string('image')->nullable($value = true);
          $table->string('membership')->nullable($value = true);
          $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer');
    }
}
