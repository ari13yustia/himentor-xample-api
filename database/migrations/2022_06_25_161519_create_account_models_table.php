<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('accounts');
        Schema::create('accounts', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id')->unsigned();
            $table->string('first_name')->collation('utf8mb4_unicode_ci');
            $table->string('last_name')->collation('utf8mb4_unicode_ci')->nullable();
            $table->tinyInteger('gender');
            $table->date('birthday');
            $table->string('phone_number')->collation('utf8mb4_unicode_ci');
            $table->string('whatsapp_number')->collation('utf8mb4_unicode_ci');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->constrained();
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
        Schema::dropIfExists('account_models');
    }
}
