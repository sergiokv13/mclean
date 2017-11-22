@extends('scaffold-interface.layouts.app')
@section('title','Index')
@section('content')

<section class="content">
<div class="box box-primary">
<div class="box-header">
    <h3>{{$team_member->name}}</h3>
</div>
    <div class="box-body">

    <ol class="breadcrumb">
        <li><a href="/scaffold-dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="/team_member"><i class="fa fa fa-users"></i> equipo</a></li>
        <li class="active">{{$team_member->name}}</li>
    </ol>

   <div class="row">
    
                    
                  <div class="col-md-6">
                    <h2 class="text-center">{{$team_member->name}}</h2>
                    <!-- #####Begin carousel-->
                    <center>
                      <img src="{{ url('members/'.$team_member->member_image)}} " alt="image hover">
                    </center>
                    <!-- #####End carousel-->
                  </div>

                  <div class="col-md-6">
                    <strong> Cargo </strong> <p>{{$team_member->position}}</p>
                    <strong> Texto de bienvenida </strong> <p>{{$team_member->welcome_title}}</p>
                    <strong> Texto de presentación </strong> <p>{{$team_member->about_team_member}}</p>
                    <strong> URL Facebook </strong> <p>{{$team_member->facebook_link}}</p>
                    <strong> URL Google Plus </strong> <p>{{$team_member->google_link}}</p>
                    <strong> URL Twitter </strong> <p>{{$team_member->twitter_link}}</p>
                    <strong> URL Linkedin </strong> <p>{{$team_member->linkedin_link}}</p>
                    
                  </div>

            
    </div>
</div>
</div>
</section>
@endsection

