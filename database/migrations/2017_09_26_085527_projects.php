<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Projects.
 *
 * @author  The scaffold-interface created at 2017-09-26 08:55:27pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Projects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('projects',function (Blueprint $table){

        $table->increments('id');
        
        $table->String('name');
        
        $table->longText('description');
        
        $table->String('link_to_experiment_demo');
        
        $table->String('link_to_user_demo');
        
        $table->String('project_image');

        $table->integer('category_id');
        
        /**
         * Foreignkeys section
         */
        
        
        
        // type your addition here

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        Schema::drop('projects');
    }
}
