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
        Schema::create('project_stats', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('proj_id')->unsigned();
            $table->foreign('proj_id')
                ->references('id')->on('projects')
                ->onDelete('cascade');
            $table->integer('support_count')->unsigned()->default(0);
            $table->integer('follow_count')->unsigned()->default(0);
            $table->float('donation_count')->default(0);
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
        Schema::dropIfExists('project_stats');
    }
};
