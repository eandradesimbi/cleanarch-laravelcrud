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
            name: new ProductName($product->name, $product->category, $product->quantity),
            createdAt: $product->created_at,
            updatedAt: $product->updated_at,
        );
    }

    public static function toManyDomainEntities(array $products): array{
        return array_map(static fn ($product) => self::toDomainEntity($product), $products);
    }
}
