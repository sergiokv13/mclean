@extends('scaffold-interface.layouts.app')
@section('content')
<section class="content">
	<div class="box box-primary">
		<div class="box-header">
			<h3>Crear nuevo usuario</h3>
		</div>
		<div class="box-body">
	<ol class="breadcrumb">
        <li><a href="/scaffold-dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="/scaffold-users"><i class="fa fa-group"></i> usuarios</a></li>
        <li class="active"> nuevo</li>
    </ol>
			<form action="{{url('scaffold-users/store')}}" method = "post">
				{!! csrf_field() !!}
				<input type="hidden" name = "user_id">
				<div class="form-group">
					<label for="">Correo electrónico</label>
					<input type="email" name = "email" class = "form-control" placeholder = "Correo electrónico">
				</div>
				<div class="form-group">
					<label for="">Nombre</label>
					<input type="text" class = "form-control" placeholder = "Nombre">
				</div>
				<div class="form-group">
					<label for="">Contraseña</label>
					<input type="password" name = "password" class = "form-control" placeholder = "contraseña">
				</div>
				<button class = "btn btn-primary" type="submit">Crear</button>
			</form>
		</div>
	</div>
</section>
@endsection
