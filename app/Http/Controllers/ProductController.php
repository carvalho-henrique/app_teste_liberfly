<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/product",
     *     description="Return all products",
     *     tags={"product"},
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
        $product = Product::all();

        return response()->json($product, 200);

    }

    /**
     * @OA\Post(
     *      path="/api/product",
     *      description="Create Product.",
     *      tags={"product"},
     *      security={
     *          {"bearerAuth":{}},
     *      },
     *      @OA\RequestBody(
     *          @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 type="object",
     *                 @OA\Property(
     *                     property="description",
     *                     description="description",
     *                     type="string",
     *                 ),
     *                 @OA\Property(
     *                     property="price",
     *                     description="price",
     *                     type="float"
     *                 )
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Produto criado com sucesso",
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Erro de validação",
     *      ),
     * )
     */
    public function store(Request $request)
    {

        $product = Product::create([
            'description' => $request->description,
            'price' => $request->price,
        ]);

        return response()->json($product, 201);
    }

    /**
     * @OA\Put(
     *      path="/api/product/{id}",
     *      tags={"product"},
     *      description="Edit product.",
     *      security={
     *          {"bearerAuth":{}},
     *      },
     *      @OA\Parameter(
     *          name="id",
     *          description="product id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(type="integer")
     *      ),
     *      @OA\RequestBody(
     *          @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 type="object",
     *                 @OA\Property(
     *                     property="description",
     *                     description="description",
     *                     type="string",
     *                 ),
     *                 @OA\Property(
     *                     property="price",
     *                     description="price",
     *                     type="float"
     *                 )
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Produto atualizado com sucesso",
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Produto não encontrado",
     *      ),
     * )
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if($product === null){
            return response()->json(['erro' => 'Impossivel realizar a atualização'], 404);
        }

        $product->fill($request->all());
        $product->save();

        return response()->json($product, 200);
    }

    /**
     * @OA\Get(
     *     path="/api/product/{product}",
     *     description="Return product",
     *     tags={"product"},
     *     security={
     *          {"bearerAuth":{}},
     *     },
     *     @OA\Parameter(
     *         name="product",
     *         in="path",
     *         description="identificador do produto",
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
        $product = Product::find($id);

        if($product === null){
            return response()->json(['erro' => 'produto pesquisado não existe'], 404);
        }

        return response()->json($product, 200);

    }

    /**
     * @OA\Delete(
     *     path="/api/product/{product}",
     *     description="Delete product",
     *     tags={"product"},
     *     security={
     *          {"bearerAuth":{}},
     *     },
     *     @OA\Parameter(
     *         name="product",
     *         in="path",
     *         description="identificador do produto",
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
        $product = Product::find($id);

        if($product === null){
            return response()->json(['erro' => 'Impossivel realizar a exclusão.'], 404);
        }

        $product->delete();
        return response()->json(['msg' => 'Exlusão feita com sucesso.'], 200);
    }
}
