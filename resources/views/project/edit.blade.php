@extends('scaffold-interface.layouts.app')
@section('title','Edit')
@section('content')

<section class="content">
<div class="box box-primary">
<div class="box-header">
    <h3>Editar proyecto</h3>
</div>
    <div class="box-body">

    <ol class="breadcrumb">
        <li><a href="/scaffold-dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="/project"><i class="fa fa-pencil"></i> proyectos</a></li>
        <li class="active">edit</li>
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
    
    <form method = 'POST' action = '{!! url("project")!!}/{!!$project->
        id!!}/update' enctype="multipart/form-data"> 
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="input-field col s6 form-group">
            <label for="name">Nombre</label>
            <input id="name" name = "name" type="text" class="validate form-control" value="{!!$project->
            name!!}"> 
        </div>

         <div class="input-field col s6 form-group">
            <label for="name">Categoría</label>
            <select name="category" id="category" class="form-control">
                @foreach($categories as $category) 
                    @if ($project->category_id == $category->id)
                        <option value="{{ $category->id}}" selected>{{ $category->name}}</option>
                    @else
                        <option value="{{ $category->id}}">{{ $category->name}}</option>
                    @endif
                @endforeach 
            </select>
        </div>


        <div class="input-field col s6 form-group">
            <label for="description">Descripción</label>
            <textarea id="description" name = "description" class="validate form-control"> 
                {{ $project->description }}
            </textarea>
        </div>
        
        <div class="input-field col s6">
                <img id="project_preview" src="{{ url('projects/'.$project->project_image)}}" alt="The image preview will be displayed here." height="100px;"/>
                <input id="project_image" name = "project_image" type="file" class="validate"><br>
        </div><br>


        <button class = 'btn btn-primary' type ='submit'>Update</button>
    </form>
</div>

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
        var field = $('<div><div class="input-field col s6 extraDoc'+ document_counter +'"><label>Add Document</label><input id="project_document[]" name ="project_document[]" type="file" class="validate"><br></div><br></div>');
        var button = $('<a id="removeDoc" class="btn btn-danger documentRemove">X</a>');
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