@extends('scaffold-interface.layouts.app')
@section('title','Create')
@section('content')

<section class="content">
<div class="box box-primary">
<div class="box-header">
    <h3>Create new category</h3>
</div>
    <div class="box-body">

    <ol class="breadcrumb">
        <li><a href="/scaffold-dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="/category"><i class="fa fa-tags"></i> categories</a></li>
        <li class="active"><i class="fa fa-tags"></i> create</li>
    </ol>
    

    <form method = 'POST' action = '{!!url("category")!!}'>
        <input type = 'hidden' name = '_token' value = '{{ Session::token() }}'>

        <div class="input-field col s6 form-group">
            <label for="name">Name</label>
            <input id="name" name = "name" type="text" class="validate form-control">
        </div>

        <button class = 'btn btn-primary' type ='submit'>Create</button>
    </form>
</div>
</div>
</section>
@endsection