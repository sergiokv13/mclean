@extends('scaffold-interface.layouts.app')
@section('title','Index')
@section('content')

<section class="content">
<div class="box box-primary">
<div class="box-header">
    <h3>All Categories</h3>
</div>
    <div class="box-body">

    <ol class="breadcrumb">
        <li><a href="/scaffold-dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-tags"></i> categories</li>
    </ol>

        <a href='{!!url("category")!!}/create' class = "btn btn-primary"><i class="fa fa-plus fa-md" aria-hidden="true"></i> New</a>        
        <div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <th>Name</th>
            <th>Projects</th>
            <th>Actions</th>
        </thead>
        <tbody>
            @foreach($categories as $category) 
            <tr>
                <td>{!!$category->name!!}</td>
                <td>
                    @foreach($category->projects() as $project) 
                        {!!$project->name!!}<br>
                    @endforeach 
                </td>
                <td>
                    <div class = 'row'>

                        <a href = '/category/{!!$category->id!!}/edit'  class = 'btn btn-primary btn-sm'><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                        <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">

                        <a onclick="delete_record({{$category->id}});" href = "#" class = "btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                       
                    </div>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
</div>
    {!! $categories->render() !!}

</div>
</div>
</section>
@endsection

<script type="text/javascript">
    function delete_record(category_id)
    {
        var res = confirm('Are you sure you want to delete this category? All related projects will be deleted.');
        if (res)
        {
            var token = $('#token').val();
            $.ajax({
               url: '{!!url("category")!!}/'+category_id,
               type: 'post',
               data: {_method: 'delete', _token :token},
               success: function(response) {
                 location.reload();
               }
            });
        }
    }
</script>