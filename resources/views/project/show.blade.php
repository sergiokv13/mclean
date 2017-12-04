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
        <li><a href="/project"><i class="fa fa fa-pencil"></i> proyectos</a></li>
        <li class="active">{{$project->name}}</li>
    </ol>

   <div class="row">
                  <div class="col-md-12">
                    <!-- #####Begin carousel-->
                    <center>
                      <img src="{{ url('projects/'.$project->project_image)}} " alt="image hover" class="img-responsive">
                    </center>
                    <!-- #####End carousel-->
                  </div>
          <div class="col-md-2"></div>
          <div class="col-md-8" style="margin-top: 100px;">
                   <h2>Detalles del proyecto</h2>
                    <hr>
                    
                    <div class="col-lg-8">
                      <p>{!!$project->description!!}</p>
                    <hr>
                      
                    </div>
                    <!-- #####End description metas-->
                    <div class="col-lg-4">
                    <dl class="description-item">
                        <dt>Category</dt>
                        {!!$project->category()->name!!}
                    </dl>
                      <dl class="description-item">
                      <dt>Documents</dt>
                      Download the documents related to this project here<br>
                      @foreach ($project->documents as $document)
                          <a href="/projects/documents/{!!$document->url!!}" target="_blank">{!!$document->url!!}</a>
                      @endforeach
                    </dl>
                    </div>
          </div>
  </div>

</div>
</div>
</section>
@endsection