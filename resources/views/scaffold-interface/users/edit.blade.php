@extends('scaffold-interface.layouts.app')
@section('content')
<section class="content">


<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
				<div class="box-header">
					<h3>Edit User ({{$user->name}})</h3>
				</div>
				<div class="box-body">
					<ol class="breadcrumb">
		        <li><a href="/scaffold-dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		        <li><a href="/scaffold-users"><i class="fa fa-group"></i> users</a></li>
		        <li class="active"> edit</li>
		    </ol>
			<form action="{{url('scaffold-users/update')}}" method = "post">
				{!! csrf_field() !!}
				<input type="hidden" name = "user_id" value = "{{$user->id}}">
				<div class="form-group">
					<label for="">Email</label>
					<input type="email" name = "email" value = "{{$user->email}}" class = "form-control" required>
				</div>
				<div class="form-group">
					<label for="">Name</label>
					<input type="text" name = "name" value = "{{$user->name}}" class = "form-control" required>
				</div>
				<div class="form-group">
					<label for="">Password</label>
					<input type="password" name = "password" class = "form-control" placeholder = "password" required>
				</div>
				<button class = "btn btn-primary" type="submit">Update</button>
			</form>
			</div>
		</div>
	</div>
	 @if (Auth::user()->Roles()->where('name','Administrator')->get()->count() > 0)
	<div class="col-md-6">
			<div class="box box-primary">
				<div class="box-header">
					<h3>Roles</h3>
				</div>
				<div class="box-body">
					<form action="{{url('scaffold-users/addRole')}}" method = "post">
						{!! csrf_field() !!}
						<input type="hidden" name = "user_id" value = "{{$user->id}}">
						<div class="form-group">
							<select name="role_name" id="" class = "form-control">
								@foreach($roles as $role)
								<option value="{{$role}}">{{$role}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<button class = 'btn btn-primary'>Add role</button>
						</div>
					</form>
					<table class = 'table'>
						<thead>
							<th>Role</th>
							<th>Action</th>
						</thead>
						<tbody>
							@foreach($userRoles as $role)
							<tr>
								<td>{{$role->name}}</td>
								@if (($user->id == 1) and ($role->name=="Administrator"))
									<td><a href="#" class = "btn btn-danger btn-sm" onclick="alert('Default role for this account.');"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
								@else
									<td><a href="{{url('scaffold-users/removeRole')}}/{{$role->name}}/{{$user->id}}" class = "btn btn-danger btn-sm" onclick="confirm('are you sure to delete this role?');"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
								@endif
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
		@endif
	</div>

</section>
@endsection
