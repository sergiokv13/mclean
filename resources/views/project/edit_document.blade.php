@extends('scaffold-interface.layouts.app')
@section('title','Documents')
@section('content')


<section class="content">
	<div class="box box-primary">
		<div class="box-header">
		    <h3>Edit project</h3>
		</div>
		
		<div class="box-body">
		 
		 <ol class="breadcrumb">
	        <li><a href="/scaffold-dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	        <li><a href="/project"><i class="fa fa-pencil"></i> proyectos</a></li>
	        <li class="active"> 
	        	<a href="/project/{!!$project->id!!}/documents"> {!!$project->name!!} - Galería</a>
	        </li>
	       	<li class="active"> editar {!!$document->name!!}</li>

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
		        id!!}/documents/{!!$document->id!!}/update' enctype="multipart/form-data"> 

		        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>

		        <div class="input-field col s6 form-group">
		            <label for="name">Nombre</label>
		            <input id="docName" name = "docName" type="text" class="validate form-control" value="{!!$document->name!!}" > 
		        </div>

		        <div class="input-field col s6 form-group">
		            <label for="name">Imagen</label><br>
		            <img id="docFile_preview" src="/projects/documents/{!!$document->url!!}" alt="The image preview will be displayed here." height="100px;"/>
		            <input id="docFile" name = "docFile" type="file" > 
		        </div>

		        <button class='btn btn-primary' type ='submit'>Guardar</button>
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
                $('#docFile_preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#docFile").change(function(){
        readURL(this);
    });
</script>

@endsection