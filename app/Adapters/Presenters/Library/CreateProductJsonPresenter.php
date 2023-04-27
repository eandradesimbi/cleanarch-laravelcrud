<?php

namespace App\Adapters\Presenters\Library;

use App\Adapters\ViewModel\JsonResourceViewModel;
use App\Core\Common\Ports\ViewModel;
use App\Core\Domain\Library\Ports\UseCases\CreateProduct\{CreateProductOutputPort, CreateProductResponseModel};
use App\Http\Resources\Library\CreateProductResource;

final class CreateProductJsonPresenter implements CreateProductOutputPort
{
    /**
     * @param CreateProductResponseModel $responseModel
     *
     * @return ViewModel
     */
    public function present(CreateProductResponseModel $responseModel): ViewModel
    {
        return new JsonResourceViewModel(new CreateProductResource($responseModel->getProduct()));
    }
}
