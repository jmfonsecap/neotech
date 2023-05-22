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
     * $this->user - User- contains the associated user
     * $this->attributes['user_id'] - int - contains the user
     * $this->attributes['payMethod'] - string - contains the payment method
     * $this->attributes['created_at'] - string (timestamp in the DB) - contains the date when the part was created
     * $this->attributes['updated_at'] - string (timestamp in the DB) - contains the last date when the part was modified
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getUser()
    {
        return $this->user;
    }
    public function setUser($user)
    {
        $this->user = $user; 
    }

    public function getCreated_at(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdated_at(): string
    {
        return $this->attributes['updated_at'];
    }

    public function setUpdated_at(string $desc): void
    {
        $this->attributes['updated_at'] = $desc;
    }

    public static function validate($request)
    {
        $request->validate([
        "totalToPay" => "required|numeric",
        "user_id" => "required|exists:users,id",
        ]);
    }
}
