<?php

namespace App\Core\Domain\Library\Ports\UseCases\ListProduct;

use App\Core\Common\Ports\ViewModel;

interface ListProductsUseCase{

    public function execute(): ViewModel;
}