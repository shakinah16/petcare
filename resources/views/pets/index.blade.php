@extends('layouts.app')

@section('content')
    <h1>Pets</h1>
    @if (count($pets) > 0)
        @foreach($pets as $pet)
            <div class="well">
                <h3><a href="/pets/{{$pet->id}}">{{$pet->name}}</a></h3>
                <small>Owner: {{$pet->user->name}}</small>
            </div>

        @endforeach
        {{$pets->links()}}
    @else
        <p class="label label-warning">No pets found</p>
    @endif
@endsection
