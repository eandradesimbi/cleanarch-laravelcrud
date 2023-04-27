<?php

namespace App\Core\Domain\Library\Ports\UseCases\CreateProduct;

use App\Core\Domain\Library\Entities\Product;

final class CreateProductResponseModel
{
    /**
     * @param Product $product
     */
    public function __construct(private Product $product)
    {
    }

    /**
     * @return Product
     */
    public function getProduct(): Product
    {
        return $this->product;
    }
}
