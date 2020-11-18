<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->tinyInteger('status')->default(0)->after('id');
            $table->unsignedBigInteger('template_id')->nullable()->after('phone');
            $table->foreign('template_id')
              ->references('id')->on('templates')
              ->onDelete('cascade');
            $table->unsignedBigInteger('symbol_id')->nullable()->after('phone');
            $table->foreign('symbol_id')
              ->references('id')->on('symbols')
              ->onDelete('cascade');
            $table->unsignedBigInteger('order_id')->nullable()->after('phone');
            $table->foreign('order_id')
              ->references('id')->on('orders')
              ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->dropColumn('symbol_id');
            $table->dropColumn('order_id');
        });
    }
}
