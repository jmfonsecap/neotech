<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    use HasFactory;

    /**
     * ITEM ATTRIBUTES
     * $this->attributes['id'] - int - contains the item primary key (id)
     * $this->attributes['quantity'] - int - contains the quantity of the item
     * $this->part - Part - contains the associated part
     * $this->attributes['part_id'] - int - contains the part id
     * $this->computer - Computer - contains the associated computer
     * $this->attributes['computer_id'] - int - contains the computer id
     * $this->order - Order- contains the associated order
     * $this->attributes['order_id'] - int - contains the order id
     * $this->attributes['created_at'] - string (timestamp in the DB) - contains the date when the part was created
     * $this->attributes['updated_at'] - string (timestamp in the DB) - contains the last date when the part was modified
     */
    protected $fillable = ['quantity', 'part_id', 'computer_id',
        'order_id'];

    public static function sumPricesByQuantities($items, $itemsInSession)
    {
        $total = 0;
        foreach ($items as $item) {
            $total = $total + ($item->getPrice() * $itemsInSession[$item->getId()]);
        }

        return $total;
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getQuantity(): int
    {
        return $this->attributes['quantity'];
    }

    public function setQuantity(string $quantity): void
    {
        $this->attributes['quantity'] = $quantity;
    }

    public function getPartId(): int
    {
        return $this->attributes['part_id'];
    }

    public function setPartId(int $pId): void
    {
        $this->attributes['part_id'] = $pId;
    }

    public function getComputerId(): int
    {
        return $this->attributes['computer_id'];
    }

    public function setComputerId(int $pcId): void
    {
        $this->attributes['computer_id'] = $pcId;
    }

    public function getOrderId(): int
    {
        return $this->attributes['order_id'];
    }

    public function setOrderId(int $orderId): void
    {
        $this->attributes['order_id'] = $orderId;
    }

    // Relations
    public function part(): BelongsTo
    {
        return $this->belongsTo(Part::class);
    }

    public function getPart(): Part
    {
        return $this->part;
    }

    public function setPart($part): void
    {
        $this->part = $part;
    }

    public function computer(): BelongsTo
    {
        return $this->belongsTo(Computer::class);
    }

    public function getComputer(): Computer
    {
        return $this->computer;
    }

    public function setComputer($computer): void
    {
        $this->computer = $computer;
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function getOrder(): Order
    {
        return $this->order;
    }

    public function setOrder($order): void
    {
        $this->order = $order;
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
}
