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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('Lname');
            $table->string('Fname');
            $table->string('Mname')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('icon')->nullable();
            $table->string('code')->nullable();
            $table->tinyInteger('admin')->default('0');
            $table->tinyInteger('dev_mode')->default('0');
            $table->tinyInteger('active')->default('1');
            $table->string('bookmarks')->nullable();
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
};
