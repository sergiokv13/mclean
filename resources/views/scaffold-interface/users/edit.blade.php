@extends('scaffold-interface.layouts.app')
@section('content')
<section class="content">


<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
				<div class="box-header">
					<h3>Editar usuario ({{$user->name}})</h3>
				</div>
				<div class="box-body">
					<ol class="breadcrumb">
		        <li><a href="/scaffold-dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		        <li><a href="/scaffold-users"><i class="fa fa-cog"></i> usuarios</a></li>
		        <li class="active"> editar</li>
		    </ol>
			<form action="{{url('scaffold-users/update')}}" method = "post">
				{!! csrf_field() !!}
				<input type="hidden" name = "user_id" value = "{{$user->id}}">
				<div class="form-group">
					<label for="">Correo electrónico</label>
					<input type="email" name = "email" value = "{{$user->email}}" class = "form-control" required>
				</div>
				<div class="form-group">
					<label for="">Nombre</label>
					<input type="text" name = "name" value = "{{$user->name}}" class = "form-control" required>
				</div>
				<div class="form-group">
					<label for="">Contraseña</label>
					<input type="password" name = "password" class = "form-control" placeholder = "contraseña" required>
				</div>
				<button class = "btn btn-primary" type="submit">Guardar</button>
			</form>
			</div>
		</div>
	</div>
</div>

</section>
@endsection
