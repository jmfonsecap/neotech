<?php

namespace App\Models;

use App\Models\Computer;
use App\Models\Part;
use App\Models\Order;
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
     * $this->computer - Computer - contains the associated computer
     * $this->order - Order- contains the associated order
    */

    protected $fillable = ['quantity', 'part_id', 'computer_id',
    'order_id'];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function setId(int $id): void
    {
        $this->attributes['id'] = $id;
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

}
