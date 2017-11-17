<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Website_information;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class Website_informationController.
 *
 * @author  The scaffold-interface created at 2017-09-25 03:15:45pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Website_informationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Index - website_information';
        $website_informations = Website_information::paginate(6);
        return view('website_information.index',compact('website_informations','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $website_information = new Website_information();
        
        $website_information->welcome_text = $request->welcome_text;
        
        $website_information->about_me = $request->about_me;
        
        $website_information->projects_text = $request->projects_text;
        
        $website_information->team_text = $request->team_text;

        $website_information->contact_email = $request->contact_email;
        
        $website_information->contact_phone = $request->contact_phone;

        $website_information->contact_phone2 = $request->contact_phone2;

        $website_information->address = $request->address;

        if ($request->about_image != null)
        {
            $image_name = time().'.'.$request->about_image->getClientOriginalExtension();

            $request->about_image->move(public_path('website'), $image_name);
            $website_information->about_image = $image_name;
        }

        if ($request->menu_image != null)
        {
            $image_name = time().'.'.$request->menu_image->getClientOriginalExtension();

            $request->menu_image->move(public_path('website'), $image_name);
            $website_information->menu_image = $image_name;
        }

        if ($request->projects_image != null)
        {
            $image_name = time().'.'.$request->projects_image->getClientOriginalExtension();

            $request->projects_image->move(public_path('website'), $image_name);
            $website_information->projects_image = $image_name;
        }

        if ($request->team_image != null)
        {
            $image_name = time().'.'.$request->team_image->getClientOriginalExtension();

            $request->team_image->move(public_path('website'), $image_name);
            $website_information->team_image = $image_name;
        }
        
        $website_information->save();

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new website_information has been created !!']);

        return redirect('website_information');
    }

    /**
     * Display the specified resource.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $title = 'Edit - website_information';
        if($request->ajax())
        {
            return URL::to('website_information/'. $id . '/edit');
        }

        if (\Auth::user()->Roles()->where('name','Administrator')->get()->count() > 0)
        {
            $website_information = Website_information::findOrfail($id);
            return view('website_information.edit',compact('title','website_information'  ));
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
        $website_information = Website_information::findOrfail($id);
    	
        $website_information->welcome_text = $request->welcome_text;
        
        $website_information->about_me = $request->about_me;
        
        $website_information->projects_text = $request->projects_text;
        
        $website_information->team_text = $request->team_text;

        $website_information->contact_email = $request->contact_email;
        
        $website_information->contact_phone = $request->contact_phone;

        $website_information->contact_phone2 = $request->contact_phone2;

        $website_information->address = $request->address;

        if ($request->about_image != null)
        {
            $image_name = time().'.'.$request->about_image->getClientOriginalExtension();

            $request->about_image->move(public_path('website'), $image_name);
            $website_information->about_image = $image_name;
        }

        if ($request->menu_image != null)
        {
            $image_name = time().'.'.$request->menu_image->getClientOriginalExtension();

            $request->menu_image->move(public_path('website'), $image_name);
            $website_information->menu_image = $image_name;
        }

        if ($request->projects_image != null)
        {
            $image_name = time().'.'.$request->projects_image->getClientOriginalExtension();

            $request->projects_image->move(public_path('website'), $image_name);
            $website_information->projects_image = $image_name;
        }

        if ($request->team_image != null)
        {
            $image_name = time().'.'.$request->team_image->getClientOriginalExtension();

            $request->team_image->move(public_path('website'), $image_name);
            $website_information->team_image = $image_name;
        }

        if ($request->mclean_image != null)
        {
            $image_name = time().'.'.$request->mclean_image->getClientOriginalExtension();

            $request->mclean_image->move(public_path('website'), $image_name);
            $website_information->mclean_image = $image_name;
        }
        
        
        $website_information->save();

        return redirect('/scaffold-dashboard');
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
        $msg = Ajaxis::MtDeleting('Warning!!','Would you like to remove This?','/website_information/'. $id . '/delete');

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
     	$website_information = Website_information::findOrfail($id);
     	$website_information->delete();
        return URL::to('website_information');
    }
}
