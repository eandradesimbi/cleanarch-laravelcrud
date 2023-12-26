<?php

namespace App\Infra\Adapters\Persistence\Eloquent\Repositories;

use App\Core\Domain\Library\Entities\Product;
use App\Core\Domain\Library\Ports\Persistence\ProductRepository;
use App\Infra\Adapters\Persistence\Eloquent\Models\Mappers\ProductMapper;
use App\Infra\Adapters\Persistence\Eloquent\Models\Product as EloquentProduct;

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

    public function getAll(): array{
        $products = EloquentProduct::get()->all();

        if (empty($products)) {
            return [];
        }

        return ProductMapper::toManyDomainEntities($products);
    }
}
