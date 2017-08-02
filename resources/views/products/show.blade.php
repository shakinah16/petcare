@extends('layouts.app')

@section('content')

    <a href="/products" class="btn btn-default">Go back</a>
    <h1>{{$products->title}}</h1>
    <img style="width:25%" src="/storage/product_image/{{$products->product_image}}" alt="">
    <br><br>
         <div><p>{!!$products->body!!}</p></div>
         <hr>
         <div><p>Price: RM{!!$products->price!!}</p></div>
         <hr>
         <div><p>SKU:{!!$products->sku!!}</p></div>
         <hr>
         <div><p>Stock:{!!$products->stock!!}</p></div>
       <small>Created at: {{$products->created_at}}</small><br>
        <small>Last updated: {{$products->updated_at}}</small>
        <hr>

    

            <a href="/products/{{$products->id}}/edit" class="btn btn-default">Edit</a>

            {!!Form::open(['action' => ['ProductsController@destroy', $products->id], 'method' => 'POST', 'class' => 'pull-right' ])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
            <br><br>
          
        
@endsection
