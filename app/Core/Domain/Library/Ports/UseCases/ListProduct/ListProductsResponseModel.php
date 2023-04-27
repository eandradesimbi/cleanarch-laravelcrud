<?php

namespace App\Core\Domain\Library\Ports\UseCases\ListProduct;

use App\Core\Domain\Library\Entities\Product;

final class ListProductsResponseModel{

    /**
     * Summary of __construct
     * @param array<Product> $products
     * 
     */
    public function __construct(private array $products){

    }

    /**
     * Summary of getProducts
     * @return array<Product>
     */
    public function getProducts(): array {
        return $this->products;
    }

}

