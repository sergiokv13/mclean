<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Team_member;
use Amranidev\Ajaxis\Ajaxis;
use Validator, Input, Redirect;
use URL;

/**
 * Class Team_memberController.
 *
 * @author  The scaffold-interface created at 2017-11-17 03:49:40pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Team_memberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Index - team_member';
        $team_members = Team_member::paginate(6);
        return view('team_member.index',compact('team_members','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - team_member';
        
        return view('team_member.create');
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
        'position.required' => 'El cargo es obligatorio.',
        'welcome_title.required' => 'El texto de bienvenida es obligatorio.',
        'about_team_member.required'=>'El texto de presentación es obligatorio.', 
        'member_image.required' => 'La imagen es obligatoria.',
        );

        $rules = array(
            'name' => 'required',
            'position' => 'required',
            'welcome_title' => 'required',
            'about_team_member' => 'required',
            'member_image' => 'required',
        );

        $this->validate($request, $rules, $messsages);

        $team_member = new Team_member();

        
        $team_member->name = $request->name;

        
        $team_member->about_team_member = $request->about_team_member;

        
        $team_member->facebook_link = $request->facebook_link;

        
        $team_member->googleplus_link = $request->googleplus_link;

        
        $team_member->twitter_link = $request->twitter_link;

        
        $team_member->linkedin_link = $request->linkedin_link;

        $team_member->welcome_title = $request->welcome_title;

        $team_member->position = $request->position;

        if ($request->member_image != null)
        {
            $image_name = time().'.'.$request->member_image->getClientOriginalExtension();

            $request->member_image->move(public_path('members'), $image_name);
            $team_member->member_image = $image_name;
        }

        
        
        $team_member->save();

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new team_member has been created !!']);

        return redirect('team_member');
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
        $title = 'Show - team_member';

        if($request->ajax())
        {
            return URL::to('team_member/'.$id);
        }

        $team_member = Team_member::findOrfail($id);
        return view('team_member.show',compact('title','team_member'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $title = 'Edit - team_member';
        if($request->ajax())
        {
            return URL::to('team_member/'. $id . '/edit');
        }

        
        $team_member = Team_member::findOrfail($id);
        return view('team_member.edit',compact('title','team_member'  ));
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
        'position.required' => 'El cargo es obligatorio.',
        'welcome_title.required' => 'El texto de bienvenida es obligatorio.',
        'about_team_member.required'=>'El texto de presentación es obligatorio.', 
        );

        $rules = array(
            'name' => 'required',
            'position' => 'required',
            'welcome_title' => 'required',
            'about_team_member' => 'required',
        );

        $this->validate($request, $rules, $messsages);

        $team_member = Team_member::findOrfail($id);
    	
        $team_member->name = $request->name;

        
        $team_member->about_team_member = $request->about_team_member;

        
        $team_member->facebook_link = $request->facebook_link;

        
        $team_member->googleplus_link = $request->googleplus_link;

        
        $team_member->twitter_link = $request->twitter_link;

        
        $team_member->linkedin_link = $request->linkedin_link;

        $team_member->welcome_title = $request->welcome_title;

        $team_member->position = $request->position;

        if ($request->member_image != null)
        {
            $image_name = time().'.'.$request->member_image->getClientOriginalExtension();

            $request->member_image->move(public_path('members'), $image_name);
            $team_member->member_image = $image_name;
        }
        
        
        $team_member->save();

        return redirect('team_member');
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
        $msg = Ajaxis::MtDeleting('Warning!!','Would you like to remove This?','/team_member/'. $id . '/delete');

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
     	$team_member = Team_member::findOrfail($id);
     	$team_member->delete();
        return URL::to('team_member');
    }
}
