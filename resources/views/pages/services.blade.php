@extends('layouts.app')

@section ('content')
       <h1>{{$title}}</h1>
       <p>This is the services page</p>
       <ul>
       @if (count($services) > 0) {{--check if services has more than zero--}}

       @foreach($services as $service)
       <li class="list-group-item">{{$service}} </li>
       @endforeach
       </ul>
       @endif
@endsection
