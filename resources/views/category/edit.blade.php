@extends('scaffold-interface.layouts.app')
@section('title','Edit')
@section('content')

<section class="content">
<div class="box box-primary">
<div class="box-header">
    <h3>Edit category</h3>
</div>
    <div class="box-body">

    <ol class="breadcrumb">
        <li><a href="/scaffold-dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="/category"><i class="fa fa-tags"></i> categories</a></li>
        <li class="active"><i class="fa fa-tags"></i> edit</li>
    </ol>
    

    <form method = 'POST' action = '{!! url("category")!!}/{!!$category->
        id!!}/update'> 
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>

        <div class="input-field col s6 form-group">
             <label for="name">name</label>
            <input id="name" name = "name" type="text" class="validate form-control" value="{!!$category->
            name!!}"> 
        </div>

       <button class = 'btn btn-primary' type ='submit'>Update</button>
    </form>
</div>
</div>
</section>
@endsection