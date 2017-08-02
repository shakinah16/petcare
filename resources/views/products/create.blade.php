@extends('layouts.app')

@section('content')
    <h1>Add Product</h1>

      
        {!! Form::open(['action'=>'ProductsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title', 'Product Name')}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder'=>'Product Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('body', 'Description')}}
            {{Form::textarea('body', '', ['class' => 'form-control', 'placeholder'=>'Product Description', 'id'=>'article-ckeditor'])}}
        </div>
        <div class="form-group" step="any">
            {{Form::label('price', 'Price')}}
            
            {!! Form::number('price',null,['class' => 'form-control','step'=>'any', 'placeholder'=>'Price']) !!}
        </div>
        <div class="form-group">
            {{Form::label('sku', 'SKU')}}
            {{Form::text('sku', '', ['class' => 'form-control', 'placeholder'=>'Stock Keeping Unit'])}}
        </div>
        <div class="form-group">
            {{Form::label('stock', 'Stock')}}
            {{Form::number('stock', '', ['class' => 'form-control', 'placeholder'=>'Stock'])}}
        </div>
        <div class="form-group">
                {{Form::file('product_image')}}
            </div>

        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}
      

    

@endsection
