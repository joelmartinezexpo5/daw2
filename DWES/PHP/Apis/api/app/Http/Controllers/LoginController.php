<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */

    /**
     * @OA\Post(
        * path="/api/login",
        * summary="Login",
        * description="Login del usuario",
        * operationId="login",
        * tags={"login"},
        * @OA\RequestBody(
        *    required=true,
        *    description="Datos del usuario",
        *    @OA\JsonContent(
        *       required={"email","password"},
        *       @OA\Property(property="email", type="string", format="email", example="prueba@prueba.es"),
        *       @OA\Property(property="password", type="string", format="password", example="12345678")
        *    ),
        * ),
        * @OA\Response(
        *  response=200,
        *  description="Login correcto",
        *  @OA\JsonContent(
        *       @OA\Property(property="user", type="object",
        *           @OA\Property(property="name", type="string"),
        *           @OA\Property(property="email", type="string")
        *       ),
        *       @OA\Property(property="token", type="string")
        *  )
        * ),
        * @OA\Response(
        *  response=401,
        *  description="No autorizado",
        *  @OA\JsonContent(
        *       @OA\Property(property="message", type="string")
        *  )
        * )
        * )
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
