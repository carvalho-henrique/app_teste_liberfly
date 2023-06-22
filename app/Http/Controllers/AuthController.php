<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * @OA\Post(
     *     path="/api/login",
     *     tags={"auth"},
     *     summary="login a registered user",
     *     operationId="login",
     *     @OA\RequestBody(
     *         description="Input data format",
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 type="object",
     *                 @OA\Property(
     *                     property="email",
     *                     description="The email of the user",
     *                     type="string",
     *                 ),
     *                 @OA\Property(
     *                     property="password",
     *                     description="The password of the user",
     *                     type="string"
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Usuário ou senha inválido!"
     *     )
     * )
     */
    public function login(Request $request){
        //autenticação email e senha
        $token = auth('api')->attempt($request->all(['email', 'password']));
        if($token){
            return response()->json(['token' => $token]);
        } else {
            return response()->json(['erro' => 'Usuário ou senha inválido!'], 403);
        }
        return $token; 
    }

    /**
     * @OA\Post(
     *     path="/api/logout",
     *     tags={"auth"},
     *     summary="logout a registered user",
     *     operationId="logout",
     *     security={
     *          {"bearerAuth":{}},
     *     },
     *     @OA\Response(
     *         response=200,
     *         description="Logout foi realizado com sucesso!"
     *     )
     * )
     */
    public function logout(){
        auth('api')->logout();
        return response()->json(['msg' => 'Logout foi realizado com sucesso!']);
    }
}
