<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ComputerResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $currPrice = $this->getCurrentPrice();
        $lastPrice = $this->getLastPrice();
        $discount = number_format(100-($currPrice*100)/$lastPrice, 2);

        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'stock' => $this->getStock(),
            'image_url' => $this->getPhoto(),
            'brand' => $this->getBrand(),
            'price_cop' => $this->getCurrentPrice(),
            'category' => $this->getCategory(),
            'details' => $this->getDetails(),
            'discount' => $discount,
        ];
    }
}