<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Website_information.
 *
 * @author  The scaffold-interface created at 2017-09-25 03:15:45pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Website_information extends Model
{
	
	
    public $timestamps = false;
    
    protected $table = 'website_informations';

	
}
