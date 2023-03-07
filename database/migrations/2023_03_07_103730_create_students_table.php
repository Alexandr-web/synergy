<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('email');
            $table->string('lastname');
            $table->string('firstname');
            $table->string('surname');
            $table->string('telegram-url')->default('');
            $table->string('stackoverflow-url')->default('');
            $table->string('github-url')->default('');
            $table->string('birth-date');
            $table->string('sex');
            $table->integer('passport-series');
            $table->integer('passport-number');
            $table->string('password');
            $table->string('city')->default('');
            $table->string('hobby')->default('');
            $table->string('favorite-planet')->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};
