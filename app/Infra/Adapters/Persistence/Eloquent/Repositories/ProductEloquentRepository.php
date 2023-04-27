<?php

namespace App\Infra\Adapters\Persistence\Eloquent\Repositories;

use App\Core\Domain\Library\Entities\Product;
use App\Core\Domain\Library\Ports\Persistence\ProductRepository;
use App\Infra\Adapters\Persistence\Eloquent\Models\Mappers\ProductMapper;

final class ProductEloquentRepository implements ProductRepository
{
    /**
     * @param Product $product
     *
     * @return Product
     */
    public function create(Product $product): Product
    {
        $eloquentProduct = ProductMapper::toEloquentModel($product);
        $eloquentProduct->save();

        return ProductMapper::toDomainEntity($eloquentProduct);
    }
}
