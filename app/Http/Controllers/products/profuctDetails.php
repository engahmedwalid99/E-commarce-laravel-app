<?php

namespace App\Http\Controllers\products;

use App\Http\Controllers\Controller;
use App\Models\products;

class profuctDetails extends Controller
{
    public function index($id){
        $product = products::find($id);
        return view("products.productDetails", ['data' => $product]);
    }
}
