<?php

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\product;

class ProductApiController extends Controller
//insert the data with validation
{
    public function store(Request $request){
        $validator=validator::make($request->all(),[
            'name'=>'required',
            'description'=>'required',
        ]);
    
        if($validator->fails()){
        return response()->json( [
            'status'=>422,
            'message'=>$validator->messages()], 422);
    }
    
    else{
    
        $product=new product;
        $product->name=$request->name;
        $product->description=$request->description;
        $product->save();

        return response()->json([
            'status'=>200,
            'message'=>'Student Created Successfully'
        ], 200);
  
    }    
    
}
// show data
public function list()
    {
    $list=product::all();

    return response()->json([
    'list'=>$list,
    'status'=>1
    ]);
    }
public function show($id){
    $list = Product::find($id);
    if($list)
    {
        return response()->json([
            'status'=>200,
            'list'=>$list
           ], 200);
    }
    else
    {
        return response()->json([
            'status'=>404,
            'list'=>'Id Not Found'
           ], 404);
    }
}

// Update Data

    public function update(Request $request,$id){
        $list = Product::find($id);
        if($list)
        {  
            $list->name = $request->name;
            $list->description = $request->description;
            $list->update();
            return response()->json([
                'status'=>200,
                'list'=>'Product Updated Successfully'
               ], 200);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'list'=>'Id Not Found'
               ], 404);
        }
    }
    //Delete data 
    public function delete($id){
        $list=Product::find($id);
        if($list)
        {
            $list->delete();
            return response()->json([
                'status'=>200,
                'list'=>'Products Deleted Successfully'
               ], 200); 

        }
        else
        {
            return response()->json([
                'status'=>404,
                'list'=>'Products Id Not Found'
               ], 404); 
        }
    }
    
}    
                                                                                                                            

