@extends('layouts.app')
@section('content')
    <h1>Edit User</h1>
    <p class="lead">Edit this user below.
        <a href="{{ route('users.index') }}">Go back to all users.</a>
    </p>
    <hr>
    <!--Espacio para mostrar los mensaje de error-->
    @if($errors->any())
        <div class="alert alert-danger">
     @foreach($errors->all() as $error)
        <p>{{ $error }}</p>
     @endforeach
        </div>
    @endif

    {!! Form::model($data, [
        'method' => 'PUT',
        'route' => ['users.update', $data->id]
    ]) !!}

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

    {!! Form::submit('Update User', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@stop
