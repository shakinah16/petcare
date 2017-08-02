@extends('layouts.app')

@section('content')
    <h1>Edit Product</h1>
    {!! Form::open(['action' => ['ProductsController@update', $products->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('title', 'Title')}}
        {{Form::text('title', $products->title, ['class' => 'form-control', 'placeholder'=>'Title'])}}
    </div>
    <div class="form-group">
        {{Form::label('body', 'Body')}}
        {{Form::textarea('body', $products->body, ['class' => 'form-control', 'placeholder'=>'Body', 'id'=>'article-ckeditor'])}}
    </div>
    <div class="form-group" step="any">
            {{Form::label('price', 'Price')}}
            {!! Form::number('price',$products->price,['class' => 'form-control','step'=>'any', 'placeholder'=>'Price']) !!}
    </div>
    <div class="form-group">
            {{Form::label('sku', 'SKU')}}
            {{Form::text('sku', $products->sku, ['class' => 'form-control', 'placeholder'=>'Stock Keeping Unit'])}}
    </div>
    <div class="form-group">
            {{Form::label('stock', 'Stock')}}
            {{Form::number('stock', $products->stock, ['class' => 'form-control', 'placeholder'=>'Stock'])}}
    </div>
    <div class="form-group">
        {{Form::file('product_image')}}
    </div>
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection