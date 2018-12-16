@extends('layouts.app')


@section('content')

<div class = "container my-4 content-size">
<h1 class = "text-center">Search Results For: {{$search_name}}</h1><hr>
@if($results->count() != 0)
        <div class = "row">
            
            @foreach($results as $product)
            <div class = "col-md-4 mt-5 prodlink ">
                    <a href = "{{route('jwelery.view', $product->id)}}"   >   <div class = "prodlist">
                <div class = "prodlist-img">
                <img src = "{{asset('images/Products/' . $product->product_name . '/' . $product->image)}}">
                </div>
                <div class = "prodlist-details">
                <h5 class = "text-center">{{$product->product_name}}</h5>
                </div>
            </div></a>
            </div>
    
            @endforeach
        </div>
        @else
        <div class = "mt-5">
        <h5 class = "text-center"><span class = "fa fa-search"></span> No results</h5></div>
        @endif
    </div>
@endsection