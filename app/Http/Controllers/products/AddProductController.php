<?php

namespace App\Http\Controllers\products;

use App\Http\Controllers\Controller;
use App\Http\Requests\products\AddProductRequest;
use App\Models\products;

class AddProductController extends Controller
{
    public function show_dashboard(){
        return view('Roles.seller');
    }

    public function show_add_product_form(){
        return view('Extends.addProduct');
    }

    public function add_product(AddProductRequest $request){
        $product = $request->validated();
        // $imagePath = $request->file('file')->store('products', 'public');
        $product = products::create([
            'name' => $product['product_name'],
            'description'=> $product['product_description'],
            'price' => $product['price'],
            // 'image' => $imagePath,
        ]);
        return redirect()->route('show_add_product_form')->with('success','Product add successfully');
    }
}