<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/user",
     *     description="Return all users",
     *     tags={"user"},
     *     security={
     *          {"bearerAuth":{}},
     *     },
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Missing Data"
     *     )
     * )
     */
    public function index()
    {
        //retorna todos os usuários
        $user = User::all();

        return response()->json($user, 200);

    }

    /**
     * @OA\Get(
     *     path="/api/user/{user}",
     *     description="Return user",
     *     tags={"user"},
     *     security={
     *          {"bearerAuth":{}},
     *     },
     *     @OA\Parameter(
     *         name="user",
     *         in="path",
     *         description="identificador do usuário",
     *         required=true,
     *      ),
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Missing Data"
     *     )
     * )
     */
    public function show($id)
    {
        //Procura usuário específico
        $user = User::find($id);

        //Verifica se existe
        if($user === null){
            return response()->json(['erro' => 'usuario pesquisado não existe'], 404);
        }

        //Retorna usuário caso encontrado
        return response()->json($user, 200);

    }

    /**
     * @OA\Delete(
     *     path="/api/user/{user}",
     *     description="Delete user",
     *     tags={"user"},
     *     security={
     *          {"bearerAuth":{}},
     *     },
     *     @OA\Parameter(
     *         name="user",
     *         in="path",
     *         description="identificador do usuário",
     *         required=true,
     *      ),
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="unable delete"
     *     )
     * )
     */
    public function destroy($id)
    {
        //Procura usuário específico
        $user = User::find($id);

        //Verifica se existe
        if($user === null){
            return response()->json(['erro' => 'Impossivel realizar a exclusão.'], 404);
        }

        //Remove usuario utilizando SoftDelete no Modal User
        $user->delete();
        return response()->json(['msg' => 'Exlusão feita com sucesso.'], 200);
    }
}
