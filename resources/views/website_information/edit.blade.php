@extends('scaffold-interface.layouts.app')
@section('title','Edit')
@section('content')

<section class="content">
<div class="box box-primary">
<div class="box-header">
    <h3>Modificar la información del sitio.</h3>
</div>
    <div class="box-body">

    <ol class="breadcrumb">
        <li><a href="/scaffold-dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-globe"></i> información</li>
    </ol>

     @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method = 'POST' action = '{!! url("website_information")!!}/{!!$website_information->
        id!!}/update' enctype="multipart/form-data" runat="server"> 
        
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>

        <h2>Sección de presentación del arquitecto </h2>
        <info>Esta sección es la primera del sitio, en la cual se presenta al arquitecto.</info><br><br>
        <div class="input-field col s6 form-group">
            <label for="about_me">Texto de sección sobre el arquitecto</label>
            <textarea id="about_me" name = "about_me" type="text" class="validate form-control">{!!$website_information->
            about_me!!}</textarea>
        </div>
        <div class="form-group">
            <label for="address">Foto del arquitecto</label><br>
                <img id="mclean_preview" src="{{ url('website/'.$website_information->mclean_image)}}" alt="The image preview will be displayed here." height="100px;"/>
                <input id="mclean_image" name = "mclean_image" type="file" ><br>
        </div>



        <h2>Sección de proyectos </h2>
        <info>En esta sección se presentan los proyectos.</info><br><br>

        <div class="input-field col s6 form-group">
            <label for="projects_text">Texto de sección de proyectos</label>
            <textarea id="projects_text" name = "projects_text" type="text" class="validate form-control">{!!$website_information->
            projects_text!!} </textarea>
        </div>


        <h2>Sección de equipo </h2>
        <info>En esta sección se presentan los integrantes del equipo.</info><br><br>

        <div class="input-field col s6 form-group">
            <label for="team_text">Texto de sección equipo</label>
            <textarea id="team_text" name = "team_text" type="text" class="validate form-control" >{!!$website_information->
            team_text!!} </textarea>
        </div>


        <h2>Sección de contacto </h2>
        <info>En esta sección se presenta el formulario de contacto, junto con la información pertinente.</info><br><br>

        <div class="input-field col s6 form-group">
            <label for="contact_email">Correo electrónico de contacto</label>
            <input id="contact_email" name = "contact_email" type="text" class="validate form-control" value="{!!$website_information->
            contact_email!!}"> 
            
        </div>
        <div class="input-field col s6 form-group">
            <label for="contact_phone">Telefono fijo de contacto</label>
            <input id="contact_phone" name = "contact_phone" type="text" class="validate form-control" value="{!!$website_information->
            contact_phone!!}"> 
            
        </div>
        <div class="input-field col s6 form-group">
            <label for="contact_phone2">Telefono celular de contacto</label>
            <input id="contact_phone2" name = "contact_phone2" type="text" class="validate form-control" value="{!!$website_information->
            contact_phone2!!}"> 
            
        </div>
        <div class="input-field col s6 form-group">
            <label for="address">Dirección</label>
            <input id="address" name = "address" type="text" class="validate form-control" value="{!!$website_information->
            address!!}"> 
            
        </div>         


        <button class = 'btn btn-primary' type ='submit'>Guardar</button>
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