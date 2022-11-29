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
        Schema::create('project_tiers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('proj_id')->unsigned();
            $table->foreign('proj_id')
                ->references('id')->on('projects')
                ->onDelete('cascade');
            // $table->bigInteger('user_id')->unsigned();
            // $table->foreign('user_id')
            //     ->references('id')->on('users')
            //     ->onDelete('cascade');
            $table->string('name');
            $table->integer('level');
            $table->integer('amount');
            $table->string('benefit');
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
        Schema::dropIfExists('project_tiers');
    }
};
