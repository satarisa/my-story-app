<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('picture')->nullable();
            $table->bigInteger('user_id', 0, 1);
            $table->foreign('user_id')->references('id')->on('users');
            $table->enum('gender', ['Female', 'Male'])->nullable();
            $table->date('birthday')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
