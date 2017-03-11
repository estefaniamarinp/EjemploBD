@extends('layouts.app')
@section('content')
    <h1>Add a New User</h1>
    <p class="lead">Set the information of the new user.</p>
    <hr>
        <!--Mensajes de error en validación de campos-->
        @if($errors->any())
            <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
            </div>
        @endif

        {!! Form::open(['route' => 'users.store']) !!}

    <div class="form-group">
        {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
        {!! Form::text('email', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('password', 'Password', ['class' => 'control-label']) !!}
        {!! Form::password('password', ['class' => 'form-control']) !!}
    </div>

        {!! Form::submit('Create New User', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
@stop
