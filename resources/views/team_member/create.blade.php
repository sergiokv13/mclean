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
            <label for="name">name</label>
            <input id="name" name = "name" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="welcome_title">welcome</label>
            <input id="welcome_title" name = "welcome_title" type="text" class="form-control">
        </div>

        <div class="form-group">
             <label for="position">position</label>
            <input id="position" name = "position" type="text" class="form-control">
        </div>

        <div class="form-group">
             <label for="about_team_member">about_team_member</label>
            <input id="about_team_member" name = "about_team_member" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="facebook_link">facebook_link</label>
            <input id="facebook_link" name = "facebook_link" type="text" class="form-control">
        </div>
        <div class="form-group">
             <label for="googleplus_link">googleplus_link</label>
            <input id="googleplus_link" name = "googleplus_link" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="twitter_link">twitter_link</label>
            <input id="twitter_link" name = "twitter_link" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="linkedin_link">linkedin_link</label>
            <input id="linkedin_link" name = "linkedin_link" type="text" class="form-control">
        </div>

        <div class="form-group">
                <img id="member_preview" src="#" alt="The image preview will be displayed here." height="100px;"/>
                <input id="member_image" name = "member_image" type="file" class="form-control"><br>
        </div><br>

        <button class = "btn btn-primary" type ='submit'>Create</button>
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

