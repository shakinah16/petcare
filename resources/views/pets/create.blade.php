@extends('layouts.app')

@section('content')
    <h1>Add Pet</h1>
    <div class="row">
      <div class="col-md-4 col-sm-4">
        {!! Form::open(['action'=>'PetsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('name', 'Name')}}
            {{Form::text('name', '', ['class' => 'form-control', 'placeholder'=>'Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('type', 'Type')}}
            {{Form::text('type', '', ['class' => 'form-control', 'placeholder'=>'Type'])}}
        </div>
        <div class="form-group">
            {{Form::label('color', 'Color')}}
            {{Form::text('color', '', ['class' => 'form-control', 'placeholder'=>'Color'])}}
        </div>
        <div class="form-group">
                {{Form::file('pet_image')}}
            </div>

        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}
      </div>

    </div>

@endsection
