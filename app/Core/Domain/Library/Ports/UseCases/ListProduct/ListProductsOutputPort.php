<?php

namespace App\Core\Domain\Library\Ports\UseCases\ListProduct;

use App\Core\Common\Ports\ViewModel;

interface ListProductsOutputPort{

     /**
      * Summary of present
      * @param ListProductsResponseModel $responseModel
      * @return ViewModel
      */

    public function present(ListProductsResponseModel $responseModel): ViewModel;
}