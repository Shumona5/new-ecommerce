<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    public function list()
    {
        $brands = Brand::paginate(5);
        return view('backend.pages.brand.list', compact('brands'));
    }

    public function create()
    {
        return view('backend.pages.brand.create');
    }

    public function store(Request $request)
    {
        //   dd($request->all());
        $validate = Validator::make($request->all(), [
            'brand_name' => 'required',
            'status' => 'required',

        ]);

        if ($validate->fails()) {

            return redirect()->back()->withErrors($validate)->withInput();
        }

        Brand::create([
            'name' => $request->brand_name,
            'description' => $request->description,

        ]);

        notify()->success('Brand Created Successfully');
        return redirect()->route('brand.list');
    }

    public function edit($brand_id)
    {
        $brands = Brand::find($brand_id);
        return view('backend.pages.brand.edit', compact('brands'));
    }

    public function update(Request $request, $brand_id)
    {
        // dd($request->all());
        $brands = Brand::find($brand_id);

        $validate = Validator::make($request->all(), [
            'brand_name' => 'required',
            'status' => 'required',

        ]);

        if ($validate->fails()) {

            return redirect()->back()->withErrors($validate)->withInput();
        }

        $brands->update([
            'name' => $request->brand_name,
            'description' => $request->description,
            'status' => $request->status,

        ]);
        notify()->success('Brand Updated Successfully');
        return redirect()->route('brand.list');
    }

    public function delete($id)
    {
        $brands=Brand::find($id);
        if($brands){
            $brands->delete();
            notify()->success('Brand Deleted Successfully');
            return redirect()->route('brand.list');
        }
        else{
            notify()->error('Brand Not Found');
            return redirect()->route('brand.list');
        }
    }
}
