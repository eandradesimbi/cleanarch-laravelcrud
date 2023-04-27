<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;

use Illuminate\Http\Request;

class CreateProductController extends Controller
{


    /**
     * @param CreateProductUseCase $useCase
     */
    public function __construct()
    {
    }


    /**
     * Permite adicionar um producto
     *
     * @OA\Post(
     *    path="/api/products",
     *    summary="Adiciona um novo produto na API",
     *    tags={"Products"},
     *
     *    @OA\RequestBody(
     *      required=true,
     *      @OA\JsonContent(
     *        type="object",
     *        required={"name","category", "quantity"},
     *        @OA\Property(property="name", type="string"),
     *        @OA\Property(property="category", type="string"),
     *        @OA\Property(property="quantity", type="integer"),
     *      )
     *    ),
     *
     *    @OA\Response(
     *      response=201,
     *      description="Author Created",
     *      @OA\JsonContent(
     *        type="object",
     *        @OA\Property(
     *          property="id",
     *          type="string",
     *          example="13b35be6-65a7-4d7f-9ad2-8caaf3c75344",
     *        ),
     *        @OA\Property(
     *          property="name",
     *          type="string",
     *          example="T-Shirt",
     *        ),
     *        @OA\Property(
     *          property="category",
     *          type="string",
     *          example="Teste",
     *        ),
     *        @OA\Property(
     *          property="quantity",
     *          type="integer",
     *          example="1",
     *        ),
     *        @OA\Property(
     *          property="createdAt",
     *          type="string",
     *          example="2022-12-14T22:24:26+00:00",
     *        ),
     *        @OA\Property(
     *          property="updatedAt",
     *          type="string",
     *          example="2022-12-14T22:24:26+00:00",
     *        ),
     *      )
     *    ),
     *
     *    @OA\Response(response="400", description="Requisição com erro",
     *      @OA\MediaType(
     *       mediaType="application/json",
     *          @OA\Schema(ref="#/components/schemas/Bad Request")
     *      )
     *    ),
     *    @OA\Response(response="401", description="Proibido",
     *      @OA\MediaType(
     *       mediaType="application/json",
     *          @OA\Schema(ref="#/components/schemas/Forbidden Error")
     *      )
     *    ),
     *    @OA\Response(response="403", description="Não autorizado",
     *      @OA\MediaType(
     *       mediaType="application/json",
     *          @OA\Schema(ref="#/components/schemas/Unauthorized Error")
     *      )
     *    ),
     *    @OA\Response(response="500", description="Erro interno",
     *      @OA\MediaType(
     *       mediaType="application/json",
     *          @OA\Schema(ref="#/components/schemas/Internal server error")
     *      )
     *    ),
     *
     * ),
     * 
     */



    /* @param  CreateProductRequest  $request
     *
     * @return JsonResponse
     */
    public function __invoke(CreateProductRequest $request)
    {
        
        return $request;
    }
}
