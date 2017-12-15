<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Project.
 *
 * @author  The scaffold-interface created at 2017-09-26 08:55:27pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Project extends Model
{
	
	
    public $timestamps = false;
    
    protected $table = 'projects';

	public function category()
    {

    	return Category::find($this->category_id);
    }

    public function documents()
    {
        return $this->hasMany('App\Document');
    }
}
