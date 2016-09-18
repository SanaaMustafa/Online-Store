<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;

class ProductController extends Controller
{
    //
     public function __construct()
    {
        $this->middleware('auth');
        
    }
    public function doLogout()
{
    \Auth::logout(); // log the user out of our application
    return redirect('login'); // redirect the user to the login screen
}
public function admin(){
        $products=Product::all();
        $categories=\App\Category::all();
        return view('ShopME.admin',['products'=>$products ,'product'=>$products,'categories'=>$categories]);

    }
   

    public function index()
    {
        //
        
        $products=Product::all();
        return view('ShopME.index',['products'=>$products ,'product'=>$products]);
    }

    public function show($id)
    {
        //
        $product = Product::find($id);
        $category = \App\Category::find($product->category);
        
        return view('ShopME.show',['product'=>$product]);
       
    }
    public function store(Request $request)
    {
//Controller of Add Product With Error at uploading image
         $title=$request->input('title');
         $price=$request->input('price');
         $shortdes=$request->input('shortdes');
         $longdes=$request->input('longdes');
         $file=$request->file('image');
    
         $filename=$file->getClientOriginalName();
         $file->move(public_path().'/img/'.$filename);
         $category_id=$request->input('category_id');
         $location=$request->input('location');
         //save section 
         $new=new Product;
        $new->title=$title;
        $new->price=$price;
        $new->shortdes=$shortdes;
        $new->longdes=$longdes;
        $new->image='public/img/'.$filename;
        $new->category_id=$category_id;
        $new->location=$location;
        $new->save();
         return redirect('/admin');

    }
    public function edit($id)
    {
        //
        $products=Product::find($id);
        
     return view('ShopME.update',['product'=>$products]);}
    
    
    public function update(Request $request, $id)
    {
        //
        $title=$request->input('title');
         $price=$request->input('price');
         $shortdes=$request->input('shortdes');
         $longdes=$request->input('longdes');
         $file=$request->file('image');
    
         $filename=$file->getClientOriginalName();
         $file->move(public_path().'/img/'.$filename);
         $category_id=$request->input('category_id');
         $location=$request->input('location');

        $new=Product::find($id);
         
        $new->title=$title;
        $new->price=$price;
        $new->shortdes=$shortdes;
        $new->longdes=$longdes;
        $new->image='public/img/'.$filename;
        $new->category_id=$category_id;
        $new->location=$location;
        $new->save();
        return redirect('/admin');

    }
     public function destroy($id)
    {
        //deleting error
        Product::destroy($id);
        return redirect('/admin');

    }
}
