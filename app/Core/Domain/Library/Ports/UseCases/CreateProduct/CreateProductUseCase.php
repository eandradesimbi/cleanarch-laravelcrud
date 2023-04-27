<?php

namespace App\Core\Domain\Library\Ports\UseCases\CreateProduct;

use App\Core\Common\Ports\ViewModel;

interface CreateProductUseCase
{
    public function execute(CreateProductRequestModel $requestModel): ViewModel;
}
