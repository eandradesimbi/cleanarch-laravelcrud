<?php

namespace App\Http\Resources\Library;

use App\Core\Domain\Library\Entities\Product;
use DateTime;
use Illuminate\Http\Resources\Json\JsonResource;

class ListProductsResource extends JsonResource{
    /**
     * Summary of __construct
     * @param Product $product
     */
    public function __construct(private Product $product){}

    public function toArray($request = null){
        return [
            'id' => $this->product->id,
            'name' => $this->product->name,
            'category' => $this->product->category,
            'quantity' => $this->product->quantity,
            'createdAt' => $this->product->createdAt->format(DateTime::ATOM),
            'updatedAt' => $this->product->updatedAt->format(DateTime::ATOM),
        ];

    }

}