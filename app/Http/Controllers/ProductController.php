<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Laravel\SerializableClosure\Signers\Hmac;

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
        //   dd($request->all());
        $validate=Validator::make($request->all(),[

            'product_name'=>'required',
            'category_id'=>'required',
            'product_price'=>'numeric|gt:0'
        ]);
        
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }
        
        $fileName=null;
        if($request->hasFile('product_image')){
            $fileName=date('Ymdhmi').'.'. $request->file('product_image')->getClientOriginalExtension();
            $request->file('product_image')->storeAs('/uploads',$fileName);
        }
       
        Product::create([
            'name'=>$request->product_name,
            'category_id'=>$request->category_id,
            'description'=>$request->description,
            'image'=>$fileName,
            'price'=>$request->product_price,
            'quantity'=>$request->quantity,
            'discount'=>$request->discount,
            'discount_type'=>$request->discount_type,
            
        ]);
       
        return redirect()->route('product.list');

    }

    public function edit($id)
    {
        $products=Product::find($id);
        $categories=Category::all();
       return view('backend.pages.product.edit',compact('products','categories'));
    }

    public function update(Request $request,$id){

        //   dd($request->all());
        $products=Product::find($id);

        $validate=Validator::make($request->all(),[

            'product_name'=>'required',
            'category_id'=>'required'
        ]);
        
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }
        
        $fileName=null;
        if($request->hasFile('product_image')){
            $fileName=date('Ymdhmi').'.'. $request->file('product_image')->getClientOriginalExtension();
            $request->file('product_image')->storeAs('/uploads',$fileName);
        }

        $products->update([

            'name'=>$request->product_name,
            'category_id'=>$request->category_id,
            'description'=>$request->description,
            'image'=>$fileName,
            'price'=>$request->product_price,
            'quantity'=>$request->quantity,
            'discount'=>$request->discount,
            'discount_type'=>$request->discount_type,
            'status'=>$request->status,

        ]);
        return redirect()->route('product.list');

    }
}
