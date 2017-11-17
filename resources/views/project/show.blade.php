@extends('scaffold-interface.layouts.app')
@section('title','Index')
@section('content')

<section class="content">
<div class="box box-primary">
<div class="box-header">
    <h3>{{$project->name}}</h3>
</div>
    <div class="box-body">

    <ol class="breadcrumb">
        <li><a href="/scaffold-dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="/project"><i class="fa fa fa-code"></i> projects</a></li>
        <li class="active">{{$project->name}}</li>
    </ol>

   <div class="row">
                  <div class="col-md-12">
                    <!-- #####Begin carousel-->
                    <center>
                      <img src="{{ url('projects/'.$project->project_image)}} " alt="image hover">
                    </center>
                    <!-- #####End carousel-->
                  </div>
                  <div class="col-md-12" style="margin-top: 100px;">
                    <h6 class="with-underline">Project Details</h6>
                    <hr>
                    <p>{!!$project->description!!}</p>
                    <hr>
                    <div class="col-lg-6">
                      <dl class="description-item">
                      <dt>Documents</dt>
                      Download the documents related to this project here<br>
                      @foreach ($project->documents as $document)
                          <a href="/projects/documents/{!!$document->url!!}" target="_blank">{!!$document->url!!}</a>
                      @endforeach
                    </dl>
                      
                    </div>
                    <!-- #####End description metas-->
                    <div class="col-lg-6">
                    <dl class="description-item">
                        <dt>Category</dt>
                        {!!$project->category()->name!!}
                        <dt>Link to experiment demo</dt>
                        <a href="http://{!!$project->link_to_experiment_demo!!}" target="_blank">{!!$project->link_to_experiment_demo!!}</a>
                        <dt>Link to user demo</dt>
                        <a href="http://{!!$project->link_to_user_demo!!}" target="_blank">{!!$project->link_to_user_demo!!}</a>
                      </dl>
                    </div>
                  </div>
                </div>
</div>
</div>
</section>
@endsection