<?php

namespace App\Core\Domain\Library\Ports\UseCases\CreateProduct;

use App\Core\Common\Ports\ViewModel;

interface CreateProductOutputPort
{
    /**
     * @return ViewModel
     */
    public function present(CreateProductResponseModel $responseModel): ViewModel;
}
