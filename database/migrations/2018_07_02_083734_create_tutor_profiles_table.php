<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutorProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutor_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->text('address')->nullable();
            $table->string('city', 255)->nullable();
            $table->string('state', 255)->nullable();
            $table->integer('country_id')->unsigned();
            $table->foreign('country_id')->references('id')->nullable()->on('countries');
            $table->text('language_id')->nullable();
            $table->text('skill_id')->nullable();
            $table->text('specialization_id')->nullable();
            $table->text('discipline_id')->nullable();
            $table->text('course_id')->nullable();
            $table->text('certification_id')->nullable();
            $table->text('about')->nullable();
            $table->string('resume', 255)->nullable();
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
        Schema::dropIfExists('tutor_profiles');
    }
}
