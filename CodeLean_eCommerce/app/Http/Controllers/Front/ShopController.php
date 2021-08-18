<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    //
    public function show($id){
        $product = Product::findOrFail($id);
        return view('front.shop.show', compact('product'));
    }
}
