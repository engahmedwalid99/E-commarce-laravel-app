<?php

namespace App\Http\Controllers\products;

use App\Http\Controllers\Controller;
use App\Models\products;

class ProductController extends Controller
{
    public function index(){
        $products = products::all();
        return view('Products', ['products' => $products]);
    }
}