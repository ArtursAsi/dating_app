<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('gender');
            $table->string('first_name');
            $table->string('last_name');
            $table->text('bio');
            $table->unsignedBigInteger('age');
            $table->string('location');
            $table->string('email')->unique();
            $table->string('profile_picture')->nullable();
            $table->unsignedBigInteger('min_age')->nullable();
            $table->unsignedBigInteger('max_age')->nullable();
            $table->string('looking_for')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
