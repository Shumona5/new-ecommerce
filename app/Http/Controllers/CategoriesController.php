<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Contracts\Service\Attribute\Required;

class CategoriesController extends Controller
{
    public function list()
    {
        return view('backend.pages.categories.list');
    }

    public function create()
    {
        return view('backend.pages.categories.create');
    }

    public function store(Request $request)
    {
        $validate=Validator::make($request->all(),[
            'name'=>'required',
            'status'=>'required'
         
        ]);

        $fileName=null;
        if($request->hasFile('image')){

            $fileName=date('ymdhsis'). "." . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('/uploads',$fileName);
        }

        Category::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'image'=>$fileName,
            'status'=>$request->status,


        ]);
        
        return redirect()->route('Category Created Successfully');
    }

    public function edit()
    {
        return view('backend.categories.edit');
    }
}
