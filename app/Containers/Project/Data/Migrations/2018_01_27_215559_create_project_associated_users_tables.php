<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProjectAssociatedUsersTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('projects_users', function (Blueprint $table) {

            $table->unsignedInteger('project_id');
            $table->unsignedInteger('user_id');
            //$table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('projects_users');
    }
}
