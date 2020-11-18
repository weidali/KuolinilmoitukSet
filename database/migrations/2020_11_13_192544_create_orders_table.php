<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('template_id')->default(1);
            $table->tinyInteger('symbol_id')->default(1);
            $table->string('obituary_language')->nullable();
            $table->text('obituary_top')->nullable();
            $table->string('obituary_occupation')->nullable();
            $table->string('obituary_firstname_1');
            $table->string('obituary_firstname_2')->nullable();
            $table->string('obituary_firstname_3')->nullable();
            $table->tinyInteger('obituary_firstname_call');
            $table->string('obituary_nickname')->nullable();
            $table->string('obituary_lastname');
            $table->string('obituary_former_lastnames')->nullable();
            $table->string('obituary_nee')->nullable();
            $table->string('obituary_birth_date');
            $table->string('obituary_birth_place')->nullable();
            $table->string('obituary_date_of_death');
            $table->string('obituary_place_of_death')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
