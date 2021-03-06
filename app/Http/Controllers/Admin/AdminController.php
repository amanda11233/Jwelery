<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Product;
use App\Category;
use App\Offer;
use App\Order;
class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function dashboard(){
        return view('admins.dashboard');
    }
    public function users(){
        $users = User::all();
        return view('admins.user', compact('users'));
    }
    public function products(){
        $products = Product::all();
        $categories = Category::all();
        return view('admins.products.products', compact('products','categories'));

    }
    public function categories(){
        $categories = Category::all();
        return view('admins.categories.categories', compact('categories'));
    }
    public function offers(){
        $offers = Offer::all();
        $categories = Category::all();
        return view('admins.offers.offers', compact('offers','categories'));
    }
    public function orders(){
        $orders = Order::all();
            return view('admins.orders.orders', compact('orders'));
    }
    public function delete_orders($id){
        $orders = Order::find($id);
        $orders->delete();
        return redirect()->route('admin.orders');

    }
}
