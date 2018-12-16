<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Mail\CareerMail;
use App\Career;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function welcome(){
        $categories = Category::paginate(3);

        return view('welcome', compact('categories'));
    }
    public function career(){
        return view('career');
    }
    public function browse(Request $request){
        $search_name = $request->search;
        $results = Product::where('product_name', 'LIKE', '%' . $search_name. '%')->get();
     
        return view('browse', compact('results','search_name'));
    }
    public function sendMail(Request $request){
        

        if(Input::hasFile('cv')){
            $CV = $request->cv;
            $extCV = $CV->getClientOriginalExtension();
            $nameCV = $CV->getClientOriginalName();
            $filenameCV = $nameCV;
            $path = public_path().'/documents/CVs/' . $request->email . '/';
            $CV->move($path, $filenameCV);
            
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'cv' => $filenameCV

            ];

            Career::create($data);
            
            $sendfile = public_path().'/documents/CVs/' . $request->email . '/' . $filenameCV;

            $email = new CareerMail($request, $sendfile);
            Mail::to('a3b4554ec8-3d5eda@inbox.mailtrap.io')->send($email);
    
            return redirect()->back()->with('sent','Your Message Has Been Sent');
        }
     
    }
}
