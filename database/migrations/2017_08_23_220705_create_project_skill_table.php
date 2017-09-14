<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectSkillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_skill', function (Blueprint $table) {
           $table->increments('id');
           $table->integer('project_id')->unsigned();
           $table->foreign('project_id')->references('id')->on('projects');

           $table->integer('skill_id')->unsigned()->nullable();
           $table->foreign('skill_id')->references('id')->on('skills');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
