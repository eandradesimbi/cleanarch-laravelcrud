<?php

namespace App\Core\Domain\Library\ValueObjects;

use App\Core\Common\ValueObjects\ValueObject;
//use App\Core\Domain\Library\Exceptions\InvalidAuthorName;

final class AuthorName implements ValueObject
{
    /**
     * @var string $name
     */
    public string $name;
    /**
     * @var string $category
     */
    public string $category;
    /**
     * @var integer $quantity
     */
    public int $quantity;
    /**
     * @param ?string $name
     * @param ?string $category
     * @param ?int $quantity
     */
    public function __construct(?string $name = null, ?string $category = null, ?int $quantity)
    {
        $this->name = $name;
        $this->category = $category;
        $this->quantity = $quantity
        //$this->validate();
    }

    /**
     * @return void
     *
     * @throws InvalidAuthorName
     */
    /*public function validate(): void
    {
        if (empty($this->firstName)) {
            throw new InvalidAuthorName();
        }

        if (empty($this->lastName)) {
            throw new InvalidAuthorName();
        }
    }*/
}
