<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PHPUnit\Framework\TestStatus\Notice;
use Symfony\Contracts\Service\Attribute\Required;

class CategoriesController extends Controller
{
    public function list()
    {
        $categories=Category::paginate(5);
        return view('backend.pages.categories.list',compact('categories'));
    }

    public function create()
    {
        return view('backend.pages.categories.create');
    }

    public function store(Request $request)
    {
        //   dd($request->all());

        $validate=Validator::make($request->all(),[
            'name'=>'required',
            'status'=>'required',

        ]);

        if($validate->fails()){
        return redirect()->back()->withErrors($validate)->withInput();
        }

        $fileName=null;
        if($request->hasFile('image')){
            $fileName=date('Ymdhmi').'.'. $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('/uploads',$fileName);
        }

        Category::create([
            'name'=>$request->name,
            'description'=>$request->description,
             'image'=>$fileName,
           
        ]);

        notify()->success('Category Created Successfully');
        return redirect()->route('categories.list');
    }


    public function edit($category_id)
    {
        $categories=Category::find($category_id);
        return view('backend.pages.categories.edit',compact('categories'));
    }

    public function update(Request $request,$category_id){

        $categories=Category::find($category_id);

        $validate=Validator::make($request->all(),[
            'name'=>'required',
            'status'=>'required',

        ]);

        if($validate->fails()){
        return redirect()->back()->withErrors($validate)->withInput();
        }

        $fileName=null;
        if($request->hasFile('image')){
            $fileName=date('Ymdhmi').'.'. $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('/uploads',$fileName);
        }

        $categories->update([

            'name'=>$request->name,
            'description'=>$request->description,
            'image'=>$fileName,
            'status'=>$request->status,

        ]);
        notify()->success('Category Updated Successfully');
        return redirect()->route('categories.list');
    }

    public function delete($id){
        try{

            $categories=Category::find($id);
        if($categories){
            $categories->delete();
            notify()->success('Category Deleted Successfully');
            return redirect()->route('categories.list');
        }else{
            notify()->error('Category Not Found');
            return redirect()->route('categories.list');
        }

        }
        catch(Exception){

            notify()->error(' This Category Can Not Delete');
            return redirect()->route('categories.list');

        }
        
    }

    }
