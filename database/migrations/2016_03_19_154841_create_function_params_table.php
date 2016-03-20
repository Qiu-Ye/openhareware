<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFunctionParamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('function_params', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('device_id');
            $table->integer('function_id');
            $table->string('name');
            $table->string('full_name');
            $table->text('desc')->default('');
            $table->string('type');
            $table->string('limit');
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
        Schema::drop('function_params');
    }
}
