<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function list()
    {
        $products=Product::paginate(5);
        return view('backend.pages.product.list',compact('products'));
    }

    public function create()
    {
        $categories=Category::all();
        return view('backend.pages.product.create',compact('categories'));
    }

    public function store(Request $request)
    {
        $validate=Validator::make($request->all(),[

            'product_name'=>'required',
            'category_id'=>'required'
        ]);
        
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }

        Product::create([
            'name'=>$request->product_name,
            'category_id'=>$request->category_id,
            'description'=>$request->description,
            'image'=>$request->product_name,
            'price'=>$request->product_price,
            'quantity'=>$request->quantity,
            'discount'=>$request->discount,
            'discount_type'=>$request->discount_type,
            
        ]);
        return redirect()->route('product.list');

    }
}
