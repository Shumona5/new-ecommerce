<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Brand;
class BrandController extends Controller
{
    public function list()
    {
        $brands=Brand::all();
        return view('backend.pages.brand.list',compact('brands'));
    }

    public function create()
    {
        return view('backend.pages.brand.create');
    }

    public function store(Request $request)
    {
        //   dd($request->all());
        $validate=Validator::make($request->all(),[
            'brand_name'=>'required',
            'status'=>'required',

        ]);

        if($validate->fails()){
           
            return redirect()->back()->withErrors($validate)->withInput();
        }

        Brand::create([
            'name'=>$request->brand_name,
            'description'=>$request->description,
            
        ]);

        return redirect()->route('brand.list');
    }
}
