<?php

namespace App\Http\Resources\Library;

use App\Core\Domain\Library\Entities\Product;
use DateTimeInterface;
use Illuminate\Http\Resources\Json\JsonResource;

final class CreateProductResource extends JsonResource
{
    /**
     * @param Product $Product
     */
    public function __construct(private Product $product)
    {
    }
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request = null)
    {
        return [
            'id' => $this->product->id,
            'name' => $this->product->getFullProduct(),
            'createdAt' => $this->product->createdAt->format(DateTimeInterface::ATOM),
            'updatedAt' => $this->product->updatedAt->format(DateTimeInterface::ATOM),
        ];
    }
}
