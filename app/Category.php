<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Category.
 *
 * @author  The scaffold-interface created at 2017-10-05 03:10:13pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Category extends Model
{
	
	
    public $timestamps = false;
    
    protected $table = 'categories';

    public function projects()
    {

    	return Project::where('category_id',$this->id)->get();
    }
	
}
