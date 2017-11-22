@extends('scaffold-interface.layouts.app')
@section('title','Edit')
@section('content')

<section class="content">
<div class="box box-primary">
<div class="box-header">
    <h3>Editar miembro del equipo</h3>
</div>
    <div class="box-body">

    <ol class="breadcrumb">
        <li><a href="/scaffold-dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="/team_member"><i class="fa fa-users"></i> equipo</a></li>
        <li class="active">editar</li>
    </ol>

    <form method = 'POST' action = '{!! url("team_member")!!}/{!!$team_member->
        id!!}/update' enctype="multipart/form-data"> 
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group ">
            <label for="name">Nombre</label>
            <input id="name" name = "name" type="text" class="form-control" value="{!!$team_member->
            name!!}"> 
        </div>

        <div class="form-group ">
            <label for="position">Cargo</label>
            <input id="position" name = "position" type="text" class="form-control" value="{!!$team_member->
            position!!}"> 
        </div>

        <div class="form-group ">
            <label for="welcome_title">Texto de bienvenida</label>
            <input id="welcome_title" name = "welcome_title" type="text" class="form-control" value="{!!$team_member->
            welcome_title!!}"> 
        </div>
        
        <div class="form-group ">
            <label for="about_team_member">Texto de presentación</label>
            <input id="about_team_member" name = "about_team_member" type="text" class="form-control" value="{!!$team_member->
            about_team_member!!}"> 
        </div>
        <div class="form-group ">
            <label for="facebook_link">URL Facebook</label>
            <input id="facebook_link" name = "facebook_link" type="text" class="form-control" value="{!!$team_member->
            facebook_link!!}"> 
        </div>
        <div class="form-group ">
            <label for="googleplus_link">URL Google Plus</label>
            <input id="googleplus_link" name = "googleplus_link" type="text" class="form-control" value="{!!$team_member->
            googleplus_link!!}"> 
        </div>
        <div class="form-group ">
            <label for="twitter_link">URL Twitter</label>
            <input id="twitter_link" name = "twitter_link" type="text" class="form-control" value="{!!$team_member->
            twitter_link!!}"> 
        </div>
        <div class="form-group ">
            <label for="linkedin_link">URL Linkedin</label>
            <input id="linkedin_link" name = "linkedin_link" type="text" class="form-control" value="{!!$team_member->
            linkedin_link!!}"> 
        </div>

         <div class="form-group">
                <img id="member_preview" src="{{ url('members/'.$team_member->member_image)}}" alt="The image preview will be displayed here." height="100px;"/>
                <input id="member_image" name = "member_image" type="file" class="form-control"><br>
        </div><br>

        <button class = "btn btn-primary" type ='submit'>Guardar</button>
    </form>
</div>
</div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript">
    
    function readURL(input) {

    if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#member_preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#member_image").change(function(){
        readURL(this);
    });

</script>

@endsection