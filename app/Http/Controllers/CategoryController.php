<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category;

class CategoryController extends Controller
{
    //


    public function store(Request $request)
    {

    	$name=$request->input('name');
    	$id=$request->input('id');

    	$new= new Category;
    	$new->id=$id;
    	$new->name=$name;
    	$new->save();
    	return redirect('/admin');
    }
    //deleteing error
    public function destroy($id)
    {
        //
        \App\Category::destroy($id);
        return redirect('/admin');

    }
}
