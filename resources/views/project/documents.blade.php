@extends('scaffold-interface.layouts.app')
@section('title','Documents')
@section('content')

<section class="content">
<div class="box box-primary">
<div class="box-header">
    <h3>{!!$project->name!!} gallery</h3>
</div>
    <div class="box-body">

	    <ol class="breadcrumb">
	        <li><a href="/scaffold-dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	        <li><a href="/project"><i class="fa fa-dashboard"></i> Projects</a></li>
	        <li class="active"><i class="fa fa-code"></i> {!!$project->name!!}</li>
	    </ol>

	    <a href='/project/{!!$project->id!!}/documents/new' class = "btn btn-primary"><i class="fa fa-plus fa-md" aria-hidden="true"></i> New</a>    
	    
	    
	    <div class="table-responsive">
		    <table class="table table-hover">
		        <thead>
		            <th>Name</th>
		            
		            <th>Actions</th>
		        </thead>
		        <tbody>
		            @foreach($documents as $document) 
		                @if ((Auth::user()->Roles()->where('name','Administrator in project '.$document->project->name.'-'.$document->project->id)->get()->count() > 0) || (Auth::user()->Roles()->where('name','Administrator')->get()->count() > 0))
		                    <tr>
		                        <td><a href="/projects/documents/{!!$document->url!!}" target="_blank">{!!$document->name!!}</a> </td>
		                        <td><a href="/project/{!!$project->id!!}/documents/{!!$document->id!!}/edit">Edit</a></td>
		                        <td><a href="/project/{!!$project->id!!}/documents/{!!$document->id!!}/delete">Delete</td>
		                    </tr>
		                @endif
		            @endforeach 
		        </tbody>
		    </table>
		</div>
	</div>
</div>
</section>
@endsection
