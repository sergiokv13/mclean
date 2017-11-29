@extends('scaffold-interface.layouts.app')
@section('title','Index')
@section('content')

<section class="content">
<div class="box box-primary">
<div class="box-header">
    <h3>Todos los proyectos</h3>
</div>
    <div class="box-body">

    <ol class="breadcrumb">
        <li><a href="/scaffold-dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-cog"></i> proyectos</li>
    </ol>
    @if (Auth::user()->Roles()->where('name','Administrator')->get()->count() > 0)
    <a href='{!!url("project")!!}/create' class = "btn btn-primary"><i class="fa fa-plus fa-md" aria-hidden="true"></i> Nuevo</a>    
    @endif
    <div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <th>Nombre</th>
            <th>Categoría</th>
            <th>Documentos</th>
        </thead>
        <tbody>
            @foreach($projects as $project) 
                
                    <tr>
                        <td>{!!$project->name!!}</td>
                        <td>{!!$project->category()->name!!}</td>

                        <td><a href="/project/{!!$project->id!!}/documents">Galeria</a></td>
                        
                        <td>
                            <div class = 'row'>
                                <a href = '/project/{!!$project->id!!}/edit'  class = 'btn btn-primary btn-sm'><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                                <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
                                    <a onclick="delete_record({{$project->id}});" href = "#" class = "btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                <a href = '/project/{!!$project->id!!}'  class = 'btn btn-success btn-sm'><i class="fa fa-eye" aria-hidden="true"></i></a>
                            </div>
                        </td>
                    </tr>
            @endforeach 
        </tbody>
    </table>
</div>
    {!! $projects->render() !!}

</div>
</div>
</section>
@endsection

<script type="text/javascript">
    function delete_record(project_id)
    {
        var res = confirm('Are you sure you want to delete this project?');
        if (res)
        {
            var token = $('#token').val();
            $.ajax({
               url: '{!!url("project")!!}/'+project_id,
               type: 'post',
               data: {_method: 'delete', _token :token},
               success: function(response) {
                 location.reload();
               }
            });
        }
    }
</script>