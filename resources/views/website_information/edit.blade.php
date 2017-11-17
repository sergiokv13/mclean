@extends('scaffold-interface.layouts.app')
@section('title','Edit')
@section('content')

<section class="content">
<div class="box box-primary">
<div class="box-header">
    <h3>Edit website information</h3>
</div>
    <div class="box-body">

    <ol class="breadcrumb">
        <li><a href="/scaffold-dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-globe"></i> website information</li>
    </ol>

    <form method = 'POST' action = '{!! url("website_information")!!}/{!!$website_information->
        id!!}/update' enctype="multipart/form-data" runat="server"> 
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>

        <div class="input-field col s6 form-group">
            <label for="welcome_text">Welcome Text</label>
            <textarea id="welcome_text" name = "welcome_text"  class="validate form-control">{!!$website_information->
            welcome_text!!}</textarea>
            
        </div>
        <div class="input-field col s6 form-group">
            <label for="about_me">About me</label>
            <textarea id="about_me" name = "about_me" type="text" class="validate form-control">{!!$website_information->
            about_me!!}</textarea>
            
        </div>
        <div class="input-field col s6 form-group">
            <label for="projects_text">Projects text</label>
            <textarea id="projects_text" name = "projects_text" type="text" class="validate form-control">{!!$website_information->
            projects_text!!} </textarea>
            
        </div>
        <div class="input-field col s6 form-group">
            <label for="team_text">Team text</label>
            <textarea id="team_text" name = "team_text" type="text" class="validate form-control" >{!!$website_information->
            team_text!!} </textarea>
            
        </div>
        <div class="input-field col s6 form-group">
            <label for="contact_email">Contact email</label>
            <input id="contact_email" name = "contact_email" type="text" class="validate form-control" value="{!!$website_information->
            contact_email!!}"> 
            
        </div>
        <div class="input-field col s6 form-group">
            <label for="contact_phone">Contact phone</label>
            <input id="contact_phone" name = "contact_phone" type="text" class="validate form-control" value="{!!$website_information->
            contact_phone!!}"> 
            
        </div>
        <div class="input-field col s6 form-group">
            <label for="contact_phone2">Contact phone 2</label>
            <input id="contact_phone2" name = "contact_phone2" type="text" class="validate form-control" value="{!!$website_information->
            contact_phone2!!}"> 
            
        </div>
        <div class="input-field col s6 form-group">
            <label for="address">Address</label>
            <input id="address" name = "address" type="text" class="validate form-control" value="{!!$website_information->
            address!!}"> 
            
        </div>
         <div class="form-group">
            <label for="address">About Image</label><br>
                <img id="about_preview" src="{{ url('website/'.$website_information->about_image)}}" alt="The image preview will be displayed here." height="100px;"/>
                <input id="about_image" name = "about_image" type="file" class="form-control"><br>
        </div>

         <div class="form-group">
            <label for="address">Menu Image</label><br>
                <img id="menu_preview" src="{{ url('website/'.$website_information->menu_image)}}" alt="The image preview will be displayed here." height="100px;"/>
                <input id="menu_image" name = "menu_image" type="file" class="form-control"><br>
        </div>
         <div class="form-group">
            <label for="address">Projects Image</label><br>
                <img id="projects_preview" src="{{ url('website/'.$website_information->projects_image)}}" alt="The image preview will be displayed here." height="100px;"/>
                <input id="projects_image" name = "projects_image" type="file" class="form-control"><br>
        </div>

         <div class="form-group">
            <label for="address">Team Image</label><br>
                <img id="team_preview" src="{{ url('website/'.$website_information->team_image)}}" alt="The image preview will be displayed here." height="100px;"/>
                <input id="team_image" name = "team_image" type="file" class="form-control"><br>
        </div>

        <div class="form-group">
            <label for="address">Mclean Profile Photo</label><br>
                <img id="mclean_preview" src="{{ url('website/'.$website_information->mclean_image)}}" alt="The image preview will be displayed here." height="100px;"/>
                <input id="mclean_image" name = "mclean_image" type="file" class="form-control"><br>
        </div>


        <button class = 'btn btn-primary' type ='submit'>Update</button>
    </form>
</div>
</div>
</section>

<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>

<script>
    CKEDITOR.replace( 'welcome_text' );
    CKEDITOR.replace( 'about_me' );
    CKEDITOR.replace( 'projects_text' );
    CKEDITOR.replace( 'team_text' );

</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<script type="text/javascript">
    
    function readURL(input, location) {
    if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $(location).attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#about_image").change(function(){
        readURL(this,"#about_preview");
    });


    $("#menu_image").change(function(){
        readURL(this,"#menu_preview");
    });


    $("#projects_image").change(function(){
        readURL(this,"#projects_preview");
    });


    $("#team_image").change(function(){
        readURL(this,"#team_preview");
    });

    $("#mclean_image").change(function(){
        readURL(this,"#mclean_preview");
    });

</script>


@endsection