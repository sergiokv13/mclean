@extends('scaffold-interface.layouts.app')
@section('content')
<section class="content">
<div class="box box-primary">
<div class="box-header">
    <h3>Edit permission</h3>
</div>
    <div class="box-body">

    <ol class="breadcrumb">
        <li><a href="/scaffold-dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="/scaffold-permissions"><i class="fa fa-key"></i> permissions</a></li>
        <li class="active"> edit</li>
    </ol>
			<form action="{{url('scaffold-permissions/update')}}" method = "post">
				{!! csrf_field() !!}
				<input type="hidden" name = "permission_id" value = "{{$permission->id}}">
				<div class="form-group">
				<label for="">permission</label>
					<input type="text" name = "name" class = "form-control" placeholder = "Name" value = "{{$permission->name}}">
				</div>
				<div class="box-footer">
					<button class = 'btn btn-primary' type = "submit">Update</button>
				</div>
			</form>
		</div>
	</div>
</section>
@endsection
