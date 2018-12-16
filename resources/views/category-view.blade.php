@extends('layouts.app')

@section('content')

<div class = "container my-4 content-size">
<h1 class = "text-center">Category: {{$category->category_name}}</h1><hr>
<div class = "row">
        <div class = "col-sm-3 col-md-3 col-sm-offset-3 col-md-offset-3">
                <div class = "sidebar mt-5">
                    <div class = "sidebar-categories">
                        <h5 class = "text-center">Categories</h5><hr>
                        <ul>
                                @foreach($categories as $category)
                                <li>
                                <a href = "{{route('category.show', $category->category_name)}}">{{$category->category_name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                    </div>
                    
                </div>
                        </div>
                        <div class = "col-sm-9 col-md-9 col-sm-offset-9 col-md-offset-9">
                                <div class = "row">
        
                                        @foreach($products as $product)
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
                        </div>
</div>
  
</div>
@endsection