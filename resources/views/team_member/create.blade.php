@extends('scaffold-interface.layouts.app')
@section('content')
<section class="content">
    <div class="box box-primary">
        <div class="box-header">
            <h3>Crear miembro de equipo</h3>
        </div>
        <div class="box-body">
    <ol class="breadcrumb">
        <li><a href="/scaffold-dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="/scaffold-users"><i class="fa fa-group"></i> equipo</a></li>
        <li class="active"> nuevo</li>
    </ol>

    <form method = 'POST' action = '{!!url("team_member")!!}' enctype="multipart/form-data" runat="server">
        <input type = 'hidden' name = '_token' value = '{{ Session::token() }}'>
        <div class="form-group">
            <label for="name">Nombre</label>
            <input id="name" name = "name" type="text" class="form-control">
        </div>
        
        <div class="form-group">
             <label for="position">Cargo</label>
            <input id="position" name = "position" type="text" class="form-control">
        </div>

        <div class="form-group">
            <label for="welcome_title">Texto de bienvenida</label>
            <input id="welcome_title" name = "welcome_title" type="text" class="form-control">
        </div>


        <div class="form-group">
             <label for="about_team_member">Texto de presentación</label>
            <input id="about_team_member" name = "about_team_member" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="facebook_link">URL Facebook</label>
            <input id="facebook_link" name = "facebook_link" type="text" class="form-control">
        </div>
        <div class="form-group">
             <label for="googleplus_link">URL Google Plus</label>
            <input id="googleplus_link" name = "googleplus_link" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="twitter_link">URL Twitter</label>
            <input id="twitter_link" name = "twitter_link" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="linkedin_link">URL Linkedin</label>
            <input id="linkedin_link" name = "linkedin_link" type="text" class="form-control">
        </div>

        <div class="form-group">
                <label>Imagen</label>
                <img id="member_preview" src="#" alt="La imagen se mostrara acá." height="100px;"/>
                <input id="member_image" name = "member_image" type="file" class="form-control"><br>
        </div><br>

        <button class = "btn btn-primary" type ='submit'>Crear</button>
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

