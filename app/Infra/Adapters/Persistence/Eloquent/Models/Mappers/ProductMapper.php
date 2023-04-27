<?php

namespace App\Infra\Adapters\Persistence\Eloquent\Models\Mappers;

use App\Core\Domain\Library\Entities\Product as DomainProduct;
use App\Core\Domain\Library\ValueObjects\ProductName;
use App\Infra\Adapters\Persistence\Eloquent\Models\Product as EloquentProduct;

final class ProductMapper
{
    /**
     * @param DomainProduct $Product
     *
     * @return EloquentProduct
     */
    public static function toEloquentModel(DomainProduct $product): EloquentProduct
    {
        return new EloquentProduct([
            'id' => $product->id,
            'name' => $product->name,
            'category' => $product->category,
            'quantity' => $product->quantity,
        ]);
    }

    /**
     * @param EloquentProduct $Product
     *
     * @return DomainProduct
     */
    public static function toDomainEntity(EloquentProduct $product): DomainProduct
    {
        return new DomainProduct(
            id: $product->id,
            name: new ProductName($product->name),
            createdAt: $Product->created_at,
            updatedAt: $Product->updated_at,
        );
    }
}