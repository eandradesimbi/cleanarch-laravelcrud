<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Core\Domain\Library\Ports\UseCases\ListProduct\ListProductsUseCase;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ListProductController extends Controller
{
    //
    public function __construct(private ListProductsUseCase $usecase){}
    

    public function __invoke(){
        $viewModel = $this->usecase->execute();
        return response()->json($viewModel->getResponse(), Response::HTTP_OK);
    }
}
