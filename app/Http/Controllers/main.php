<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Website_information;
use App\Project;
use App\Category;
use App\Team_member;

class main extends Controller
{
    public function index() {

        $website_information = Website_information::find(1);
        $projects = Project::all();
        $categories = Category::all();
        $team_members = Team_member::all();

        return view('home',compact('website_information','categories','projects','team_members'));
    }
}
