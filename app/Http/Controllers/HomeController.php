<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Website_information;
use App\Project;
use App\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $website_information = Website_information::find(1);
        $projects = Project::all();
        $categories = Category::all();

        return view('home',compact('website_information','categories','projects'));
    }

    public function no_authorization()
    {
        return view('no_authorization');
    }
}
