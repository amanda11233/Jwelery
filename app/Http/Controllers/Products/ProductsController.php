<?php

namespace App\Http\Controllers\Products;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use App\Product;
use App\Offer;
use App\Category;
class ProductsController extends Controller
{

    public function __construct(){
        $this->middleware('auth:admin')->except('index','viewProduct');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('products',compact('products','categories'));
    }

    public function viewProduct($id){
        $product = Product::find($id);
        $offers = Offer::where('category_id', $product->category_id)->first();
        if($offers != null){
            $discount = $product->price * ($offers->discount / 100);
            $calculate_discount = $product->price - $discount;
        }
        
        $similarProducts = Product::where([['category_id','=', $product->category_id],['id', '!=', $id]])->inRandomOrder()->limit(5)->get();
        return view('product-view', compact('product' , 'similarProducts','offers', 'discount','calculate_discount'));
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
        try{
            if(Input::hasFile('image')){
                $productImage = $request->image;
                $extProductImage = $productImage->getClientOriginalExtension();
                $nameProductImage = $productImage->getClientOriginalName();
                $filenameProductImage = $nameProductImage;
                $path = public_path().'/images/Products/' . $request->name . '/';
                $productImage->move($path, $filenameProductImage);
    
            }

            $data = [
                'product_name' => $request->name,
                'category_id' => $request->category,
                'price' => $request->price,
                'image' => $filenameProductImage,
                'desc' => $request->desc,
            ];

            Product::create($data);

            return redirect()->route('admin.products');
        }catch(Exception $e){
            dd($e);
        }

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
    public function edit($id)
    {
        //
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
        
    }
    public function editProduct(Request $request){
        try{
            if(Input::hasFile('image')){
                $productImage = $request->image;
                $extProductImage = $productImage->getClientOriginalExtension();
                $nameProductImage = $productImage->getClientOriginalName();
                $filenameProductImage = $nameProductImage;
                $path = public_path().'/images/Products/' . $request->name . '/';
                $productImage->move($path, $filenameProductImage);
    
            }

            $id = $request->id;
            $data = [
                'product_name' => $request->name,
                'category_id' => $request->category,
                'price' => $request->price,
                'image' => $filenameProductImage,
                'desc' => $request->desc,
            ];

            Product::where('id', $id)->update($data);

            return redirect()->route('admin.products');
        }catch(Exception $e){
            dd($e);
        }
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product =  Product::find($id);
        $product->delete();
        File::deleteDirectory(public_path('/images/Products/' . $product->product_name));
        return redirect()->route('admin.products');
    }
}
