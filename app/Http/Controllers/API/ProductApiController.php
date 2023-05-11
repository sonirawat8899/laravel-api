<?php

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\product;

class ProductApiController extends Controller
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
}    
                                                                                                                            

