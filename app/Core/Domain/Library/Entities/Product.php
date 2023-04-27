<?php

namespace App\Core\Domain\Library\Entities;

use App\Core\Common\Entities\Entity;
use App\Core\Common\Traits\{WithCreatedAt, WithUpdatedAt};
use App\Core\Domain\Library\ValueObjects\ProductName;
use DateTime;

final class Product extends Entity
{
    use WithCreatedAt, WithUpdatedAt;
    /**
     * @var string $name
     */
    public string $name;
    /**
     * @var string $category
     */
    public string $category;
    /**
     * @var int $quantity
     */
    public int $quantity;

    /**
     * @param ?string $id
     * @param ?ProductName $name
     * @param DateTime $createdAt
     * @param DateTime $updatedAt
     */
    public function __construct(
        ?string $id = null,
        ?ProductName $name = null,
        ?DateTime $createdAt = null,
        ?DateTime $updatedAt = null,
    ) {
        parent::__construct($id);
        $this->name = $name->name;
        $this->category = $name->category;
        $this->quantity = $name->quantity;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return string
     */
    public function getFullProduct(): string
    {
        return $this->name . ' ' . $this->category . ' ' . $this->quantity;
    }

}
