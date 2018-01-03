<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Website_information;
use App\Project;
use App\Category;
use App\Team_member;
use App\Mail\mailme;

use Mail;

class main extends Controller
{
    public function index() {

        $website_information = Website_information::find(1);
        $projects = Project::all();
        $categories = Category::all();
        $team_members = Team_member::all();

        return view('home',compact('website_information','categories','projects','team_members'));
    }

    public function contact_mail(Request $request)
    {
        $mail = new mailme();

        $nombre = $request->name;
        $email = $request->email;
        $content = $request->message;
        $title = 'Mensaje de contacto de '.$nombre;

        Mail::send('emails.mailme', ['title' => $title,'nombre' => $nombre,'correo' => $email, 'content' => $content], function ($message)
        {
        	$message->subject('Contacto');

            $message->from("contactos@maclean.com", "Contactos Maclean");

            $message->to('macleanarquitectura@gmail.com');

        });
        

       return redirect('/');
    }

}
