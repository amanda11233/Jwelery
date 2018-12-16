<?php

namespace App\Http\Controllers\Categories;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use App\Category;
use App\Product;
class CategoriesController extends Controller
{

    public function __construct(){
        $this->middleware('auth:admin')->except('show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        if(Input::hasFile('image')){
            $categoryImage = $request->image;
            $extcategoryImage = $categoryImage->getClientOriginalExtension();
            $namecategoryImage = $categoryImage->getClientOriginalName();
            $filenamecategoryImage = $namecategoryImage;
            $path = public_path().'/images/Categories/' . $request->name . '/';
            $categoryImage->move($path, $filenamecategoryImage);

        }
        $data = [
            'category_name' => $request->name,
            'image' => $filenamecategoryImage,
        ];

        Category::create($data);
        return redirect()->route('admin.categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($categoryName)
    {
        $categories = Category::all();
        $category= Category::where('category_name', $categoryName)->first();
        $products = Product::where('category_id',$category->id)->get();
        return view('category-view', compact('products','category','categories'));
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

       $category =  Category::find($id);
       File::deleteDirectory(public_path('/images/categories/' . $category->category_name));
        $category->delete();
        return redirect()->route('admin.categories');
    }
}
