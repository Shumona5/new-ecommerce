<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PHPUnit\Framework\TestStatus\Notice;
use Symfony\Contracts\Service\Attribute\Required;

class CategoriesController extends Controller
{
    public function list()
    {
        $categories=Category::all();
        return view('backend.pages.categories.list',compact('categories'));
    }

    public function create()
    {
        return view('backend.pages.categories.create');
    }

    public function store(Request $request)
    {
        //  dd($request->all());

        $validate=Validator::make($request->all(),[
            'name'=>'required',
            'status'=>'required',

        ]);

        if($validate->fails()){
        return redirect()->back()->withErrors($validate)->withInput();
        }

        Category::create([
            'name'=>$request->name,
            'description'=>$request->description,
            // 'image'=>$request->name,
           
        ]);

        return redirect()->route('categories.list');
    }

    }
