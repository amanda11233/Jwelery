@extends('layouts.app')

@section('content')
<div class="container-fluid cart-main">
        <div class="container cart">
            <div class="cart-head">
                YOUR CART
            <a href = "{{route('product.index')}}"><button class="continue-btn">Continue Shopping</button></a>
            </div>
            <div class="table-responsive-lg cart-tbl-main">
                
   @if(Session::has('cart'))
    
    <table class=" table cart-tbl ">
        <tr>
            <th >PRODUCT NAME</th>
            <th >QUANTITY</th>
            <th >PRICE</th>
        
            <th ></th>
        </tr>
       @foreach($products as $product)
    <tr>
    <td class="td1">{{$product['item']['product_name']}}</td>
    <td class="td2">{{$product['qty']}}</td>
    <td class="td3">{{$product['price']}}</td>

    <td ><a href = "{{route('cart.delete' , $product['item']['id'])}}"><button class = "btn btn-danger"><span class= "fa fa-trash"></span></button></a></td>
    

    
    </tr>
     @endforeach
    <tr >
        <td></td>
    <td colspan="5" class="td6"><strong>Total:</strong> Rs {{$totalPrice}}</td>
    </tr>
   
    </table>
<a href = '{{route('checkout')}}'><button class="confirm-btn mt-5">CheckOut</button></a>
    
    
    
   @else
<hr>
<h4 class = "text-center">No Items in <span class = "fa fa-shopping-cart"></span>  </h4>
   @endif
            </div>
        </div>
        
    </div>
    
@endsection