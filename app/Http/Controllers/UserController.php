<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function store(Request $request)
    {
      
        $validator=Validator::make($request->all(),[
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required|min:6',
        ]);
        if($validator->fails()){
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(), 
            ], 422);
        }
        $user=new User();
        $user->first_name=$request->first_name;
        $user->last_name=$request->last_name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);

        if($user->save()){
            return response()->json([
                'success'=>true,
                'message'=>'User created successfuly',
                'data'=>$user
            ],200);
        }else{
            return response()->json([
                'success'=>false,
                'message'=>'User not created',
            ],500);
        }

    }


    public function login(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }  
        try {      
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                $user = Auth::user();
                $token = $user->createToken('token')->plainTextToken;
    
                return response()->json([
                    'token' => $token,
                    'user_id' => $user->id,
                    'role' => $user->role, 
                    'success' => true
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Email və ya şifrə yanlışdır.'
                ], 401);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Serverdə xəta baş verdi: ' . $e->getMessage()
            ], 500);
        }
    }
    
    
    
}