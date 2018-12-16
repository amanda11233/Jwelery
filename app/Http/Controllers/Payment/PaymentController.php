<?php

namespace App\Http\Controllers\Payment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Session;
use App\Cart;
use Stripe\Stripe;
use Stripe\Charge;
use App\Order;
class PaymentController extends Controller
{

    public function __construct(){
        $this->middleware('auth:web');
    }
    public function payWithStript(Request $request){
           
    }

    public function billing(){
        return view('finalOrder');
    }
    public function showCheckoutForm(){
        if(!Session::has('cart')){
            return view('cart');
        }
        $oldcart = Session::get('cart');
        $cart = new Cart($oldcart);
        $total = $cart->totalPrice;

        return view('checkout' , ['total' => $total]);
    }

    public function postCheckout(Request $request){
        if(!Session::has('cart')){
            return redirect()->route('cart');
        }
        $oldcart = Session::get('cart');
        $cart = new Cart($oldcart);

      
        try{
            Stripe::setApiKey('sk_test_R1u35IwajKKdqvfD7fpEDfnJ');
           $charge = Charge::create(array(
                "amount" => $cart->totalPrice * 100,
                "currency" => "usd",
                "source" => $request->input('token'),
                "description" => "Test Charge"
            ));    
            $order = new Order();
            $order->cart = serialize($cart); 
            $order->address = $request->address;
            $order->name = $request->name;
            $order->payment = $charge->id;

            Auth::user()->orders()->save($order);

        }catch(Exception $e){
         dd($e);
            return redirect()->route('checkout')->with('error',  $e->getMessage());
        }


        Session::forget('cart');
        return redirect()->route('welcome')->with('purchased', 'Items Purchased');
    }
}
