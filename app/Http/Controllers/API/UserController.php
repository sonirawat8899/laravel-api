<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\registration;

class UserController extends Controller
{
    public function group(Request $request)
    {
        $validator=Validator::make($request->all(),[
        'name'=>'required',
        'email'=>'required',
        'phone'=>'required',
        'address'=>'required',
        'password'=>'required'
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>422,
                'message'=>$validator->messages()
            ]);
        }
        else
        {
            $user=new registration;
            $user->name=$request->name;
            $user->email=$request->email;
            $user->phone=$request->phone;
            $user->address=$request->address;
            $user->password=$request->password;
            $user->save();

            return response()->json([
             'status'=>200,
             'message'=>'Data inserted successfully'
            ], 200);
        }
    }
}
