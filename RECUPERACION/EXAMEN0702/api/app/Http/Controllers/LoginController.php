<?php

namespace App\Http\Controllers;

use Hash;
use Illuminate\Http\Request;
use App\Models\User;
class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user=User::where('email',$request->email)->first();
        if(!$user || !Hash::check($request->password,$user->password)){
            return response()->json(['message'=>'No autorizado'],401);
         }
        return response()->json([
        'user'=>[
            'name'=>$user->name,
            'email'=>$user->email,
        ],
        'token'=>$user->createToken($request->email)->plainTextToken]);
    }
}
