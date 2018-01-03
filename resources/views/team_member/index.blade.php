@extends('scaffold-interface.layouts.app')
@section('title','Index')
@section('content')


<section class="content">
<div class="box box-primary">
<div class="box-header">
    <h3>Imagenes del equipo</h3>
</div>
    <div class="box-body">

    <ol class="breadcrumb">
        <li><a href="/scaffold-dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-group"></i> equipo</li>
    </ol>

        <a href="{{url('/team_member/create')}}" class = "btn btn-primary"><i class="fa fa-plus fa-md" aria-hidden="true"></i> Nuevo</a>
    <div class="table-responsive">
    <table class="table table-responsive">
        <thead class = "table table-hover">
            <th>Nombre</th>
            <th>Imagen</th>
        </thead>
        <tbody>
            @foreach($team_members as $team_member) 
            <tr>
                <td>{!!$team_member->name!!}</td>
                <td>
                    <img width="200px" src="{{ url('members/'.$team_member->member_image)}}">
                </td>
                <td>
                    <div class = 'row'>
                        <a href = '/team_member/{!!$team_member->id!!}/edit'  class = 'btn btn-primary btn-sm'><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
                            <a onclick="delete_record({{$team_member->id}});" href = "#" class = "btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                    </div>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
    </div>
    {!! $team_members->render() !!}

</div>
</div>
</section>
@endsection

<script type="text/javascript">
    function delete_record(member_id)
    {
        var res = confirm('Está seguro que desea eliminar a este miembro?');
        if (res)
        {
            var token = $('#token').val();
            $.ajax({
               url: '{!!url("team_member")!!}/'+member_id,
               type: 'post',
               data: {_method: 'delete', _token :token},
               success: function(response) {
                 location.reload();
               }
            });
        }
    }
</script>