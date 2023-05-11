<?php

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductApiController extends Controller
{
    public function store(Request $request){
        $validator=validator::make($request->all(),[
            'name'=>'required',
            'description'=>'required',
            'image'=>'required|mimes:jpeg,jpg,png,gif|max:10000',
        ]);
    
        if($validator->fails()){
    
     
        return response()->json(
        [
            'status'=>422,
            'message'=>$validator->message()
        ], 422);
    }
    
    else{
        $product=new Product;
        $product=new $request->name;
        $product=new $request->description;
        $product=new $request->image;
        $product->save();

        return response()->json([
            'status'=>200,
            'message'=>'Student Created Successfully'
        ], 200);
    }

    
}
}    
                                                                                                                            

