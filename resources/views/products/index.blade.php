@extends('layouts.app')

@section('content')
    <h1>Products</h1>
    @if (count($products) > 0)
        @foreach($products as $product)
            <div class="well">
              <div class="row">
                <div class="col-md-4 col-sm-4">
                  <img style="width:75%" src="/storage/product_image/{{$product->product_image}}" alt="">
                </div>
                    <div class="col-md-8 col-sm-8">
                        <h3><a href="/products/{{$product->id}}">{{$product->title}}</a></h3>
                    </div>

              </div>  
                
            
            </div>

        @endforeach
        {{$products->links()}}
    @else
        <p class="label label-warning">No products found</p>
    @endif
@endsection
