<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTaskTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {

            $table->increments('id');
            $table->unsignedInteger('project_id');
            $table->unsignedInteger('board_id');
            $table->unsignedInteger('creator_id');
            $table->unsignedInteger('assigned_id');
            $table->string('title');
            $table->text('description');
            $table->timestamps();
            //$table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('tasks');
    }
}
