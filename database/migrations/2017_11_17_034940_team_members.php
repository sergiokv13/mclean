<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Team_members.
 *
 * @author  The scaffold-interface created at 2017-11-17 03:49:40pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class TeamMembers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('team_members',function (Blueprint $table){

        $table->increments('id');
        
        $table->String('name');

        $table->String('welcome_title');

        $table->String('position');
        
        $table->longText('about_team_member');
        
        $table->String('facebook_link');
        
        $table->String('googleplus_link');
        
        $table->String('twitter_link');
        
        $table->String('linkedin_link');

        $table->String('member_image');
        
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
        Schema::drop('team_members');
    }
}
