@extends('scaffold-interface.layouts.app')
@section('title','Add Document')
@section('content')


<section class="content">
	<div class="box box-primary">
		<div class="box-header">
		    <h3>Add Document</h3>
		</div>
		
		<div class="box-body">
		    <ol class="breadcrumb">
		        <li><a href="/scaffold-dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		        <li><a href="/project"><i class="fa fa-code"></i> Projects</a></li>
		        <li><a href="/project/{!!$project->id!!}/documents"><i class="fa fa-code"></i> Gallery</a></li>
		        <li class="active">edit</li>
		    </ol>

		    <form method = 'POST' action = '{!! url("project")!!}/{!!$project->
		        id!!}/documents/addDocument' enctype="multipart/form-data"> 

		        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>

		         <div class="input-field col s6 form-group">
		            <label for="name">Name</label>
		            <input id="docName" name = "docName" type="text" class="validate form-control" > 
		        </div>

		        <div class="input-field col s6 form-group">
		            <label for="name">Image</label>
		            <input id="docFile" name = "docFile" type="file" class="validate form-control" > 
		        </div>

		        <button class='btn btn-primary' type ='submit'>Add</button>
		    </form>
		</div>
	</div>
</section>

@endsection