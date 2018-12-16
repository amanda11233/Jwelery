@extends('layouts.app')

@section('content')
<div class="container">
<div class = "row">

    <div class = "col-sm-7 col-md-7 col-sm-offset-7 col-md-offset-7">
            <div class = "payment-form">
                
                    <h4 class = "text-center payment-form-title">Payment</h4>
            <form action = "{{route('checkout.submit')}}" mehtod = "get" id = "checkout-form">
                        @csrf
                        <div class = "custom-form">
                            <div class = "custom-title p-3">
                                    <h6><strong>Shipping and Billing Information</strong></h6>
                            </div>
                               
                                <div class = "alert alert-danger" id = "err"  {{!Session::has('error') ? 'hidden':''}} >
                            {{Session::get('error')}}
                                </div>
                            <div class = "custom-form-group">
                                    <div class = "row">
                                        <label for = "name" class = "col-sm-4 col-md-4 col-sm-offset-4 col-md-offset-4 text-right">
                                            Name
                                        </label>
                                        <div class = "col-sm-6 col-md-6">
                                            <input type = "text" id = "name"  name = "name" class = "custom-form-control" required>
                                        </div>
                                    </div>
                            </div>
                            <div class = "custom-form-group mt-2">
                                    <div class = "row">
                                        <label for = "address" class = "col-sm-4 col-md-4 col-sm-offset-4 col-md-offset-4 text-right">
                                            Address
                                        </label>
                                        <div class = "col-sm-6 col-md-6">
                                            <input type = "text" id = "address" class = "custom-form-control" name = "address" required>
                                        </div>
                                    </div>
                            </div>
                            <div class = "custom-form-group mt-2">
                                    <div class = "row">
                                        <label for = "card-holder" class = "col-sm-4 col-md-4 col-sm-offset-4 col-md-offset-4 text-right" >
                                            Card Holder's Name
                                        </label>
                                        <div class = "col-sm-6 col-md-6">
                                            <input type = "text" id = "card-holder" class = "custom-form-control" required>
                                        </div>
                                    </div>
                            </div>
                            <div class = "custom-form-group mt-2">
                                    <div class = "row">
                                        <label for = "card" class = "col-sm-4 col-md-4 col-sm-offset-4 col-md-offset-4 text-right">
                                            Credit Card Number
                                        </label>
                                        <div class = "col-sm-6 col-md-6">
                                            <input type = "text" id = "card" class = "custom-form-control" placeholder = "xxxx-xxxx-xxxx-xxxx" required>
                                        </div>
                                    </div>
                            </div>
                            <div class = "custom-form-group mt-2">
                                <div class = "row">
                                    
                                    <div class = "col-sm-6 col-md-6">
                                        
                                            <div class = "row">
                                                    <label for = "card-exp-month" class = "col-sm-8 col-md-8 col-sm-offset-8 col-md-offset-8 text-right">
                                                        Expire Month
                                                    </label>
                                                    <div class = "col-sm-4 col-md-4">
                                                        <input type = "text" id = "card-exp-month" class = "custom-form-control" placeholder = "mm" required>
                                                    </div>
                                                </div>
                                    </div>
                                    <div class = "col-sm-6 col-md-6">
                                        
                                            <div class = "row">
                                                    <label for = "card-exp-year" class = "col-sm-4 col-md-4 col-sm-offset-4 col-md-offset-4 text-right">
                                                            Expire Year
                                                    </label>
                                                    <div class = "col-sm-4 col-md-4">
                                                        <input type = "text" id = "card-exp-year" class = "custom-form-control" placeholder = "yyyy" required>
                                                    </div>
                                                </div>
                                    </div>
                            </div>
                            </div>
                            <div class = "custom-form-group mt-2">
                                    <div class = "row">
                                        <label for = "cvc" class = "col-sm-4 col-md-4 col-sm-offset-4 col-md-offset-4 text-right">
                                            CVC
                                        </label>
                                        <div class = "col-sm-6 col-md-6">
                                            <input type = "number" id = "cvc" class = "custom-form-control" placeholder = "123" required>
                                        </div>
                                    </div>
                            </div>
                            <div class="custom-form-group">
                                <div class = "row">
                                    <div class = "col-sm-4 col-md-4">

                                    </div>
                                    <div class = "col-sm-6 col-md-6">
                                            <button class = "pay-button" type = "submit">Confirm Payment</button>
                                        </div>
                                </div>
                            </div>
                        </div>                       
                    </form>
                </div>
    </div>
    <div class= "col-sm-5 col-md-5 col-sm-offset-5 col-md-offset-5 mt-5">
        <div class = "stripe-img">
        <img src = "{{asset('images/stripe.png')}}">
        </div>
    </div>
</div>

</div>

@endsection

@section('scripts')
<script src="https://js.stripe.com/v2/"></script>
<script src="{{asset('js/checkout.js')}}"></script>
@endsection