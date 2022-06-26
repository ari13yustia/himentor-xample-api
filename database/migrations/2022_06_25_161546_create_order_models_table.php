<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('orders');
        Schema::create('orders', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id')->unsigned();
            $table->integer('price');
            $table->unsignedBigInteger('account_id')->nullable();
            $table->foreign('account_id')->references('id')->on('accounts')->constrained();
            $table->unsignedBigInteger('mentor_id')->nullable();
            $table->foreign('mentor_id')->references('id')->on('mentors')->constrained();
            $table->timestamps();
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_models');
    }
}
