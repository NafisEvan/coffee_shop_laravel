<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food', function (Blueprint $table) {
            $table->bigIncrements('id');
          $table->string('name');
          $table->string('price');
          $table->string('discount_amount');
          $table->string('status');
          $table->string('ingredients');
          $table->string('image')->nullable($value = true);
          $table->string('suggested');

           });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('food');
    }
}
