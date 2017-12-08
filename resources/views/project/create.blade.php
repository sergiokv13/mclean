@extends('scaffold-interface.layouts.app')
@section('title','Create')
@section('content')

<section class="content">
<div class="box box-primary">
<div class="box-header">
    <h3>Create new project</h3>
</div>
    <div class="box-body">

    <ol class="breadcrumb">
        <li><a href="/scaffold-dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="/project"><i class="fa fa-pencil"></i> proyectos</a></li>
        <li class="active">nuevo</li>
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
    
    <form method = 'POST' action = '{!!url("project")!!}' enctype="multipart/form-data" id="form-creation">
        <input type = 'hidden' name = '_token' value = '{{ Session::token() }}'>
        {{ csrf_field() }}
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        
        <div class="input-field col s6 form-group">
            <label for="name">Nombre</label>
            <input id="name" name = "name" type="text" class="validate form-control">
        </div>


        <div class="input-field col s6 form-group">
            <label for="name">Categoría</label>
            <select name="category" id="category" class="form-control">
                @foreach($categories as $category) 
                    <option value="{{ $category->id}}">{{ $category->name}}</option>
                @endforeach 
            </select>
        </div>

        <div class="input-field col s6 form-group">
            <label for="description">Descripción</label>
            <textarea id="description" name = "description" class="validate form-control"></textarea>
        </div>
        
        <div class="input-field col s6">
                <img id="project_preview" src="#" alt="The image preview will be displayed here." height="100px;"/>
                <input id="project_image" name = "project_image" type="file" class="validate"><br>
        </div><br>

        <button class = 'btn btn-primary' type ='submit'>Create</button>
    </form>
</div>
</div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript">

    var document_counter = 1;
    
    function readURL(input) {

    if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#project_preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#project_image").change(function(){
        readURL(this);
    });

    $(".documentAdd").click(function(){
        document_counter += 1;
        var field = $('<div class="input-field col s6 extraDoc'+ document_counter +'"><label>Add Document '+ document_counter +'</label><input id="project_document_name[]" name = "project_document_name[]" placeholder="Document name" type="text" class="validate form-control" ><input id="project_document[]" name = "project_document[]" type="file" class="validate"></div>');
        var button = $('<a id="removeDoc" documentRemove">Delete Document ' + document_counter + '</a>');
        field.append(button);
        button.click(remove_field);
        $(".extra-documents").append(field);
        $('input[name=document_counter]').val(document_counter);

    });

    remove_field = function(){
        $(this).parent().remove();
        document_counter -= 1;
        //$(".extraDoc"+document_counter).remove();
        //document_counter -= 1;
    };

</script>

<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>

<script>
    CKEDITOR.replace( 'description' );
</script>

@endsection