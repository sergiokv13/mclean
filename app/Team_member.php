<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Team_member.
 *
 * @author  The scaffold-interface created at 2017-11-17 03:49:40pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Team_member extends Model
{
	
	
    public $timestamps = false;
    
    protected $table = 'team_members';

	
}
