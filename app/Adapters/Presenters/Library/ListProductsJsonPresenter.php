<?php

namespace App\Adapters\Presenters\Library;

use App\Adapters\ViewModel\JsonResourceViewModel;
use App\Core\Common\Ports\ViewModel;
use App\Core\Domain\Library\Ports\UseCases\ListProduct\{ListProductOutputPort, ListProductsResponseModel};
use App\Http\Resources\Library\ListProductsResource;

final class ListProductsJsonPresenter implements ListProductOutputPort{

    /**
     * Summary of present
     * @param ListProductsResponseModel $responseModel
     * @return ViewModel
     */
    public function present(ListProductsResponseModel $responseModel): ViewModel
    {
        return new JsonResourceViewModel(ListProductsResource::collection($responseModel->getProducts()));
    }
}