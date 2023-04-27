<?php

namespace App\Core\Domain\Library\Ports\Persistence;

use App\Core\Domain\Library\Entities\Product;

interface ProductRepository
{
    /**
     * @param Product $product
     * @return Product
     */
    public function create(Product $product): Product;
}
