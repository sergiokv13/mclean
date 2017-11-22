@extends('scaffold-interface.layouts.app')
@section('content')
<section class="content">
<div class="box box-primary">
<div class="box-header">
	<h3>Todos los usuarios</h3>
</div>
	<div class="box-body">

	<ol class="breadcrumb">
        <li><a href="/scaffold-dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-cog"></i> Usuarios</li>
    </ol>

		<a href="{{url('/scaffold-users/create')}}" class = "btn btn-primary"><i class="fa fa-plus fa-md" aria-hidden="true"></i> Nuevo</a>

	<div class="table table-responsive">
		<table class = "table table-hover">
		<thead>
			<th>Nombre</th>
			<th>Correo electrónico</th>
			<th>Roles</th>
		</thead>
		<tbody>
			@foreach($users as $user)
			@if ((Auth::user() == $user) || (Auth::user()->Roles()->where('name','Administrator')->get()->count() > 0))
				<tr>
					<td>{{$user->name}}</td>
					<td>{{$user->email}}</td>
					<td>
					@if( count($user->roles) != 0 )
						@foreach($user->roles as $role)
						<small class = 'label bg-blue'>{{$role->name}}</small>
						@endforeach
					@else
						<small class = 'label bg-red'>No Roles</small>
					@endif
					</td>
					<td>
						<a href="{{url('/scaffold-users/edit')}}/{{$user->id}}" class = 'btn btn-primary btn-sm'><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
						@if (Auth::user()->Roles()->where('name','Administrator')->get()->count() > 0)
							<a href="{{url('scaffold-users/delete')}}/{{$user->id}}" class = "btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?');"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
						@endif
					</td>
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
