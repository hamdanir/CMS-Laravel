<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    public function index (){
        $databrand = Brand::all();
        return view('Brand.brand', ['databrand' => $databrand,'no' => 1 ]);
    }

    public function create (){
        return view('Brand/createBrand');
    }

    public function store(Request $request)
    {
        // Validate the input data (you can customize this validation as needed)
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            // Add more validation rules for other fields if needed
        ]);

        // Create a new Type instance and save it to the database
        Brand::create($validatedData);

        // Redirect back to the index page after adding the item
        return redirect()->route('brands.index')->with('success', 'New item added successfully.');
    }
    

    public function show (Brand $brand, $id){
        $brand = Brand::find($id);
        return view ('Brand/updatebrand', ['brand' => $brand,]);
    }

    public function update (Request $request, Brand $brand){
        $updatebrand = Brand::find($request->brandId);

        $updatebrand->id = $request->brandId;
        // dd($updatebrand->id); 
        $updatebrand->name = $request->nameBrand;
        // dd($updatebrand->name);
        if($updatebrand->save()){
            return redirect('/brands');
        }
        else{
            return redirect()->back()->withInput();
        }
    }

    public function delete(Brand $brand, $id){
        $brand = Brand::destroy($id);
        return redirect('/brands');
    }

    
}
