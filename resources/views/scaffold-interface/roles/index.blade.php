@extends('scaffold-interface.layouts.app')
@section('content')
<section class="content">
<div class="box box-primary">
<div class="box-header">
    <h3>All Roles</h3>
</div>
    <div class="box-body">

    <ol class="breadcrumb">
        <li><a href="/scaffold-dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-user-plus"></i> roles</li>
    </ol>
    <div class="table-responsive">
			<table class="table table-hover">
				<head>
					<th>Role</th>
				</head>
				<tbody>
					@foreach($roles as $role)
					<tr>
						<td>{{$role->name}}</td>

					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		</div>
	</div>
</section>
@endsection
