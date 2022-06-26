<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMentorModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('mentors');
        Schema::create('mentors', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id')->unsigned();
            $table->string('profesion')->collation('utf8mb4_unicode_ci');
            $table->text('address')->collation('utf8mb4_unicode_ci')->nullable();
            $table->text('linkedin_link')->collation('utf8mb4_unicode_ci')->nullable();
            $table->text('insta_link')->collation('utf8mb4_unicode_ci')->nullable();
            $table->text('fb_link')->collation('utf8mb4_unicode_ci')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('province_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->unsignedBigInteger('account_id');
            $table->foreign('account_id')->references('id')->on('accounts')->constrained();
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
        Schema::dropIfExists('mentor_models');
    }
}
