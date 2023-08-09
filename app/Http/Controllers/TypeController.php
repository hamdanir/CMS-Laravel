<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\Brand;

class TypeController extends Controller
{
    public function index (){
        $datatype = Type::all();
        return view('Type.type', [
            'datatype' => $datatype,
            'no' => 1 // Add this line to initialize $no
        ]);
        
    }

    public function create (){
        $brands = Brand::all();
        return view('Type/createType', ['brands' => $brands]);
    }

    public function store(Request $request)
    {
    $brand = Brand::find($request->brand_id);
    
    Type::create([
        'nameType' => $request->nameType,
        'codeBrand' => $brand->id,
        'nameBrand' => $brand->name
    ]);

    return redirect()->route('types.index'); 
    }

    public function show (Type $type, $id){
        $type = Type::find($id);
        $brands = Brand::all();
        return view ('Type/updatetype', [
            'type' => $type,
            'brands' => $brands,
        ]);
    }

    public function update(Request $request)
    {
    $type = Type::findOrFail($request->typeId); 

    $brand = Brand::find($request->brand_id);

    
    $type->nameType = $request->nameType;
    $type->codeBrand = $brand->id;
    $type->nameBrand = $brand->name;
    $type->save(); 

    return redirect()->route('types.index');
    }

    public function delete(Type $type, $id){
        $type = Type::destroy($id);
        return redirect('/types');
    }

}
