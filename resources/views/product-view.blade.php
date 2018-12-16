@extends('layouts.app')

@section('content')

<script>
        jQuery(document).ready(function($){

            $('#etalage').etalage({
                thumb_image_width: 500,
                thumb_image_height: 400,
                source_image_width: 900,
                source_image_height: 1200,
                show_hint: true,
                click_callback: function(image_anchor, instance_id){
                    alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
                }
            });

        });
        </script>
<div class = "container">
    <div class = "row">
        	<div class="col-md-6 view-pic">
                    <div class="single_grid">
                    <div class="grid images_3_of_2">
                    <ul id = "etalage">
                        <li>
                    <img src = "{{asset('images/Products/' . $product->product_name . '/' . $product->image)}}" class="etalage_thumb_image"> 
                        <img src = "{{asset('images/Products/' . $product->product_name . '/' . $product->image)}}" class="etalage_source_image"> 
                </li>
                <li>
                    <img src = "{{asset('images/Products/' . $product->product_name . '/' . $product->image)}}" class="etalage_thumb_image"> 
                        <img src = "{{asset('images/Products/' . $product->product_name . '/' . $product->image)}}" class="etalage_source_image"> 
                </li>
                <li>
                    <img src = "{{asset('images/Products/' . $product->product_name . '/' . $product->image)}}" class="etalage_thumb_image"> 
                        <img src = "{{asset('images/Products/' . $product->product_name . '/' . $product->image)}}" class="etalage_source_image"> 
                </li>
                </ul>
            </div></div>
                </div>
        <div class = "col-md-6 mt-5">
            <div class = "prodview py-3">
                <div class = "prodview-title">
                        <h4 class = "text-center">
                                {{$product->product_name}}
                            </h4>
                </div><hr>
                    <div class = "prodview-details">
                        <div class = "row">

                                <div class = "col-sm-4"> <h6>Price:</h6></div>
                                @if($offers == null)
                                <div class = "col-sm-6"><h6>Rs {{$product->price}}</h6></div>
                                @else
                        <div class = "col-sm-6"> <h6>Rs {{$calculate_discount}} &nbsp;({{$offers->offer_name}})</h6><h6 style = "color: grey; text-decoration: line-through; ">Rs {{$product->price}}</h6>  <h6 style = "color: grey; "> Save Rs {{$discount}}</h6></div>
                               
                                @endif
                        </div><br>
                        <div class = "row">

                                <div class = "col-sm-4"> <h6>Description:</h6></div>
                                <div class = "col-sm-8"><p class = "text-justify"> {{$product->desc}}</p></div>
                        </div><hr>
                            @if(Auth::guard('web')->user())
                    <a href = "{{route('cart.addToCart', $product->id)}}">
                           
                            <button class = "btn btn-primary" style = "width: 100%;">
                                    <span class = "fa fa-plus"></span>&nbsp;
                                    Add To Cart </button></a>
                        @else
                        <div class = "alert alert-warning">
                            <strong><span class = "fa fa-bell"></span>&nbsp;Notice</strong><hr>
                            <h6>You Must Be Logged in to Purchase</h6>
                        </div>
                    @endif    
                </div>
                   
            </div>
           
        </div>
    </div>
</div><hr>
<div class = "container-fluid">
    <div class = "">
        <h4 class = "text-center">Similar Products</h4>
    </div>
<div class="row mt-5">
        @foreach($similarProducts as $data)
        <div class = "col-sm-3 col-md-3">
        <div class="similar-item">
            <div class="similar-link">
                    <a href = "{{route('jwelery.view',$data->id)}}">  <img class = "img-responsive multicarousel-img"  src = "{{asset('images/Products/' . $data->product_name . '/' . $data->image)}}" ></a>
            </div>
        </div>
        </div>
        @endforeach

</div>
</div>



@endsection