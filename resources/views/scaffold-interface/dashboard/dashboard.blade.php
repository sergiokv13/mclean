@extends('scaffold-interface.layouts.app')
@section('title','Dashboard')
@section('content')
<section class="content">
<div class="box box-primary">
<div class="box-header">
    <h3>
	Dashboard
	<small>Panel de control</small>
	</h3>
</div>
    <div class="box-body">
	
	<ol class="breadcrumb">
		<li><a href="/scaffold-dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li class="active">index</li>
	</ol>

	
		<div class="row">
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-blue">
					<div class="inner">
						<h3>Usuarios</h3>
						<p>Administración de usuarios</p>
					</div>
					<div class="icon">
						<i class="fa fa-group"></i>
					</div>
					<a href="{{url('scaffold-users')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>


			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-blue">
					<div class="inner">
						<h3>Información</h3>
						<p>Información general de la página</p>
					</div>
					<div class="icon">
						<i class="fa fa-globe"></i>
					</div>
					<a href="/website_information/1/edit" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>

			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-blue">
					<div class="inner">
						<h3>Equipo</h3>
						<p>Administración de la sección equipo</p>
					</div>
					<div class="icon">
						<i class="fa fa-heart"></i>
					</div>
					<a href="/team_members" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>


			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-blue">
					<div class="inner">
						<h3>Categorias</h3>
						<p>Administración de categorías de proyectos</p>
					</div>
					<div class="icon">
						<i class="fa fa-tags"></i>
					</div>
					<a href="/category" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-blue">
				<div class="inner">
					<h3>Proyectos</h3>
					<p>dministración de proyectos</p>
				</div>
				<div class="icon">
					<i class="fa fa-code"></i>
				</div>
				<a href="/project" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		

</div>
</div>
</section>
@endsection
