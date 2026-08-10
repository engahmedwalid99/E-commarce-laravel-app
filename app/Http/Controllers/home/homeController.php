<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\products;

class homeController extends Controller
{
    public function index(){
        $products = products::paginate(6);
        return view('home', ['products'=> $products]);
    }
}
