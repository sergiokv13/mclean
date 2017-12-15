<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Website_informations.
 *
 * @author  The scaffold-interface created at 2017-09-25 03:15:45pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class WebsiteInformations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('website_informations',function (Blueprint $table){

        $table->increments('id');
        
        $table->string('welcome_text');

        $table->longText('about_me');
        
        $table->longText('projects_text');

        $table->longText('team_text');
        
        $table->String('contact_email');
        
        $table->String('contact_phone');
        
        $table->String('contact_phone2');
        
        $table->String('address');
                
        $table->String('about_image');
        
        $table->String('menu_image');
        
        $table->String('projects_image');

        $table->String('team_image');

        $table->String('mclean_image');

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
        Schema::drop('website_informations');
    }
}
