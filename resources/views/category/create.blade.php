@extends('scaffold-interface.layouts.app')
@section('title','Create')
@section('content')

<section class="content">
<div class="box box-primary">
<div class="box-header">
    <h3>Crear nueva categoría</h3>
</div>
    <div class="box-body">

    <ol class="breadcrumb">
        <li><a href="/scaffold-dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="/category"><i class="fa fa-tags"></i> categorías</a></li>
        <li class="active"></i> nueva</li>
    </ol>
        
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form method = 'POST' action = '{!!url("category")!!}'>
        <input type = 'hidden' name = '_token' value = '{{ Session::token() }}'>

        <div class="input-field col s6 form-group">
            <label for="name">Nombre</label>
            <input id="name" name = "name" type="text" class="validate form-control">
        </div>

        <button class = 'btn btn-primary' type ='submit'>Crear</button>
    </form>
</div>
</div>
</section>
@endsection