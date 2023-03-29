<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{

    /**
     * ORDER ATTRIBUTES
     * $this->attributes['id'] - int - contains the order primary key (id)
     * $this->attributes['totalToPay'] - int - contains the total to pay for the order
     * $this->attributes['paid'] - bool - says if the order'd been paid or not
     * $this->attributes['delivered'] - bool - says if the order'd been delivered or not
     */
    protected $fillable = ['totalToPay', 'paid', 'delivered'];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function setId(int $id): void
    {
        $this->attributes['id'] = $id;
    }

    public function getTotal(): int
    {
        return $this->attributes['totalToPay'];
    }

    public function setTotal(string $total): void
    {
        $this->attributes['totalToPay'] = $total;
    }

    public function getPaid(): bool
    {
        return $this->attributes['paid'];
    }

    public function setPaid(string $paid): void
    {
        $this->attributes['paid'] = $paid;
    }

    public function getDelivered(): bool
    {
        return $this->attributes['delivered'];
    }

    public function setDelivered(string $delivered): void
    {
        $this->attributes['delivered'] = $delivered;
    }

    //Relations
    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }

    public function getItems(): Collection
    {
        return $this->items;
    }

    public function setItems(Collection $items): void
    {
        $this->items = $items;
    }
}
