<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Amranidev\Ajaxis\Ajaxis;
use URL;
use Spatie\Permission\Models\Role;

/**
 * Class CategoryController.
 *
 * @author  The scaffold-interface created at 2017-10-05 03:10:13pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        if (\Auth::user()->Roles()->where('name','Administrator')->get()->count() > 0)
        {
            $title = 'Index - category';
            $categories = Category::paginate(6);
            return view('category.index',compact('categories','title'));
        }
        else
        {
            return view('no_authorization');
        }
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
            $title = 'Create - category';
            
            return view('category.create');
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
        $category = new Category();

        
        $category->name = $request->name;

        
        
        $category->save();

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new category has been created !!']);

        return redirect('category');
    }


    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        if (\Auth::user()->Roles()->where('name','Administrator')->get()->count() > 0)
        {
            $title = 'Edit - category';
            if($request->ajax())
            {
                return URL::to('category/'. $id . '/edit');
            }
        }
        else
        {
            return view('no_authorization');
        }
        
        $category = Category::findOrfail($id);
        return view('category.edit',compact('title','category'  ));
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
        $category = Category::findOrfail($id);
    	
        $category->name = $request->name;
        
        
        $category->save();

        return redirect('category');
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
        $msg = Ajaxis::MtDeleting('Warning!!','Would you like to remove This?','/category/'. $id . '/delete');

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
     	$category = Category::findOrfail($id);
        foreach($category->projects() as $project) 
        {
            $role_name = 'Administrator in project '.$project->name.'-'.$project->id;
            $role = Role::where('name',$role_name)->get()->first();
            $role->delete();
            $project->delete();
        }
     	$category->delete();
        return URL::to('category');
    }
}
