<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Session;
use App\Offer;
use App\Cart;
class CartController extends Controller
{

    public function __construct(){
        $this->middleware('auth:web');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index(){
                if(!Session::has('cart')){
                    return view('cart');

                }
                $oldcart = Session::get('cart');
                $cart = new Cart($oldcart);
                
        $mightLike = Product::inRandomOrder()->take(4)->get();
        
       
        return view('cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
     }
    public function addToCart(Request $request, $id)
    {
  
        $product = Product::find($id);
        
        $oldcart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldcart);
        $offer = Offer::where('category_id', $product->category_id)->first();
        $qty = $request->qty;
        $cart->add($product, $product->id, $offer, $qty);

        $request->session()->put('cart', $cart);
        
        $mightLike = Product::inRandomOrder()->take(4)->get();
        return redirect()->back()->with('added');
    }


    public function deleteItem($id){
        $oldcart = Session::get('cart', $id);
        $cart = new Cart($oldcart);
 
      $cart->delete($id);
      Session::put('cart', $cart);
        
       
         return redirect()->back()->with('removed','Item Removed From Cart');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
    }
}
