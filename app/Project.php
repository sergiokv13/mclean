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

    public static function generate_thumbs_projects()
    {
        $projects = Project::all();

        foreach ($projects as $project) {
            $image_name = $project->project_image;

            \Image::make(public_path('projects/').$image_name)
            ->resize(null, 150 , function ($constraint){
                 $constraint->aspectRatio();
            })->save(public_path('projects/')."thumb_".$image_name);

        }

        return true;
    }

    public static function generate_thumbs_documents()
    {
        $documents = Document::all();
        foreach ($documents as $document) {
            $new_document = $document->url;
             \Image::make(public_path('projects/documents/').$new_document)
            ->resize(null, 150 , function ($constraint){
                 $constraint->aspectRatio();
            })->save(public_path('projects/documents/')."thumb_".$new_document);
        }
        return true;
    }
}
