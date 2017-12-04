<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Project;
use App\Document;
use App\Website_information;
use App\Category;
use App\Http\Controllers\Log;
use Amranidev\Ajaxis\Ajaxis;
use URL;
use Spatie\Permission\Models\Role;

/**
 * Class ProjectController.
 *
 * @author  The scaffold-interface created at 2017-09-26 08:27:01pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Index - project';
        $projects = Project::paginate(6);
        return view('project.index',compact('projects','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        if (\Auth::user()->Roles()->where('name','Administrator')->get()->count() > 0)
        {
            $title = 'Create - project';
            $categories = Category::all();
            
            return view('project.create',compact('categories','title'));
        }
        else
        {
            return view('no_authorization');
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $messsages = array(
        'name.required'=>'El nombre es obligatorio.',
        'description.required' => 'La descripción del proyecto es obligatoria.',
        'category.required' => 'La categoría es obligatoria.',
        'project_image.required'=>'La imagen del proyecto es obligatoria.', 
        );

        $rules = array(
            'name' => 'required',
            'description' => 'required',
            'category' => 'required',
            'project_image' => 'required',
        );

        $this->validate($request, $rules, $messsages);


        $project = new Project();

       
        $project->name = $request->name;

        $project->description = $request->description;

        $project->category_id = $request->category;


        if ($request->project_image != null) {

            $image_name = time().'.'.$request->project_image->getClientOriginalExtension();
            
            $request->project_image->move(public_path('projects'), $image_name);

            $project->project_image = $image_name;
        }

        $project->save();

        $role_name = 'Administrator in project '.$project->name.'-'.$project->id;
        Role::create(['name' => $role_name]);


        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new project has been created !!']);

        return redirect('project');
    }

    /**
     * Display the specified resource.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        $title = 'Show - project';

        if($request->ajax())
        {
            return URL::to('project/'.$id);
        }

        $project = Project::findOrfail($id);
        return view('project.show',compact('title','project'));
    }

    public function public_show($id,Request $request)
    {
       $website_information = Website_information::find(1);
       $title = 'Show - project';

        if($request->ajax())
        {
            return URL::to('project/'.$id);
        }

        $projects = Project::all();
        $project = Project::findOrfail($id);
        $categories = Category::all();
        $projects_in_category = Project::where('category_id',$project->category()->id)->get();
        return view('project.public_show',compact('title','project','website_information','projects_in_category','projects','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $title = 'Edit - project';
        if($request->ajax())
        {
            return URL::to('project/'. $id . '/edit');
        }

        $project = Project::findOrfail($id);
         $categories = Category::all();
        if ((\Auth::user()->Roles()->where('name','Administrator in project '.$project->name.'-'.$project->id)->get()->count() > 0) || (\Auth::user()->Roles()->where('name','Administrator')->get()->count() > 0))
        {
            return view('project.edit',compact('title','project','categories'  ));
        }
        else
        {
            return view('no_authorization');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
           $messsages = array(
        'name.required'=>'El nombre es obligatorio.',
        'description.required' => 'La descripción del proyecto es obligatoria.',
        'category.required' => 'La categoría es obligatoria.',
        );

        $rules = array(
            'name' => 'required',
            'description' => 'required',
            'category' => 'required',
        );

        $this->validate($request, $rules, $messsages);

        $project = Project::findOrfail($id);

        $role_name = 'Administrator in project '.$project->name.'-'.$project->id;
        
        $projectRole = Role::all()->where('name',$role_name)->first();

        $project->name = $request->name;

        //$projectRole->name = 'Administrator in project '.$project->name.'-'.$project->id;
    	
        $project->description = $request->description;

        $project->description = $request->description;

        $project->category_id = $request->category;


        if ($request->project_image != null)
        {
            $image_name = time().'.'.$request->project_image->getClientOriginalExtension();

            $request->project_image->move(public_path('projects'), $image_name);
            $project->project_image = $image_name;
        }
        
        
        $project->save();
        #$projectRole->save();

        return redirect('project');
    }

    /**
     * Delete confirmation message by Ajaxis.
     *
     * @link      https://github.com/amranidev/ajaxis
     * @param    \Illuminate\Http\Request  $request
     * @return  String
     */
    public function DeleteMsg($id,Request $request)
    {
        $msg = Ajaxis::MtDeleting('Warning!!','Would you like to remove This?','/project/'. $id . '/delete');

        if($request->ajax())
        {
            return $msg;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param    int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::findOrfail($id);
        $role_name = 'Administrator in project '.$project->name.'-'.$project->id;
        $role = Role::where('name',$role_name)->get()->first();
        $role->delete();
     	$project->delete();
        return URL::to('project');
    }

    public function documents($id)
    {
        $project = Project::findOrfail($id);

        $documents = $project->documents;

        return view('project.documents',compact('documents', 'project'));
    }

    public function newDocument($id)
    {
        $project = Project::find($id);

        return view('project.addDocument', compact('project'));
    }

    public function addNewDocument($project_id, Request $request)
    {

        $messsages = array(
        'docName.required'=>'El nombre es obligatorio.',
        'docFile.required'=>'La imagen del proyecto es obligatoria.', 
        );

        $rules = array(
            'docName' => 'required',
            'docFile' => 'required',
        );

        $this->validate($request, $rules, $messsages);


        $project = Project::find($project_id);

        $document = new Document();

        $document->name = $request->docName;

        $new_document = time().'.'.$request->docFile->getClientOriginalExtension();

        $request->docFile->move(public_path('projects/documents'), $new_document);

        $document->url = $new_document;

        $document->project_id = $project->id;

        $document->save();

        $documents = $project->documents;

        return view('project.documents', compact('documents','project'));
    }

    public function editDocument($project_id, $document_id)
    {
        $project = Project::find($project_id);
        $document = Document::find($document_id);
        return view('project.edit_document', compact('project', 'document'));
    }

    public function updateDocument($project_id, $document_id, Request $request)
    {



        $messsages = array(
        'docName.required'=>'El nombre es obligatorio.',
        'docFile.required'=>'La imagen del proyecto es obligatoria.', 
        );

        $rules = array(
            'docName' => 'required',
            'docFile' => 'required',
        );

        $this->validate($request, $rules, $messsages);

        $document = Document::find($document_id);

        $new_document = time().'.'.$request->docFile->getClientOriginalExtension();

        $request->docFile->move(public_path('projects/documents'), $new_document);

        $document->url = $new_document;

        $document->name = $request->docName;

        $document->save();

        $documents = Project::find($project_id)->documents;

        return view('project.documents', compact('documents'));

    }

    public function deleteDocument($project_id, $document_id)
    {
        $document = Document::find($document_id);
        $project = Project::find($project_id);
        $document->delete();
        $documents = $project->documents;
        return view('project.documents', compact('project', 'documents'));
    }
}
