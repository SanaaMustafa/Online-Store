<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    public function cartItems()
    {
        return $this->hasMany('App\CartItem');
    }
}

