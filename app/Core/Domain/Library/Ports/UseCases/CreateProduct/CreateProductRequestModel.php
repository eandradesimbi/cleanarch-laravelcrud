<?php

namespace App\Core\Domain\Library\Ports\UseCases\CreateProduct;

final class CreateProductRequestModel
{
    /**
     * @param array $attributes
     */
    public function __construct(private array $attributes = [])
    {
    }

    /**
     * @return string|null
     */
    public function getName(): string|null
    {
        return $this->attributes['name'] ?? null;
    }

    /**
     * @return string|null
     */
    public function getCategory(): string|null
    {
        return $this->attributes['category'] ?? null;
    }

    /**
     * @return integer|null
     */
    public function getQuantity(): string|null
    {
        return $this->attributes['quantity'] ?? null;
    }
}
