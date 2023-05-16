<?php

namespace App\Models;

use App\Models\Type;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Part extends Model
{
    /**
     * PART ATTRIBUTES
     *
     * $this->attributes['id'] - int - contains the PART primary key (id)
     * $this->attributes['name'] - string - contains the part name
     * $this->attributes['photo'] - string - contains the part photo
     * $this->attributes['stock'] - int - contains the quantity of this reference in stock
     * $this->attributes['brand'] - string - contains the part's brand
     * $this->attributes['type'] - Type - contains the type of part
     * $this->attributes['price'] - int - contains the price of the part
     * $this->attributes['details'] - string - contains a description and details of the part
     * $this->attributes['created_at'] - string (timestamp in the DB) - contains the date when the part was created
     * $this->attributes['updated_at'] - string (timestamp in the DB) - contains the last date when the part was modified
     * $this->computers - Computer[] - contains the associated computers
     */
    protected $fillable = ['stock', 'name', 'photo', 'brand', 'type', 'price', 'details'];

    public function getLabels()
    {
        $colums = [
            'name',
            'stock',
            'brand',
            'type',
            'price',
            'actions',
        ];

        return $colums;
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setName(string $desc): void
    {
        $this->attributes['name'] = $desc;
    }

    public function getStock(): int
    {
        return $this->attributes['stock'];
    }

    public function setStock(int $stock): void
    {
        $this->attributes['stock'] = $stock;
    }

    public function getPhoto(): string
    {
        return $this->attributes['photo'];
    }

    public function setPhoto(string $photo)
    {
        $this->attributes['photo'] = $photo;
    }

    public function getBrand(): string
    {
        return $this->attributes['brand'];
    }

    public function setBrand(string $desc): void
    {
        $this->attributes['brand'] = $desc;
    }

    public function getPrice(): int
    {
        return $this->attributes['price'];
    }

    public function setPrice(int $desc): void
    {
        $this->attributes['price'] = $desc;
    }

    public function getDetails(): string
    {
        return $this->attributes['details'];
    }

    public function setDetails(string $desc): void
    {
        $this->attributes['details'] = $desc;
    }

    //It was necessary to use the underscore because setCreatedAt is an Eloquent
    //method
    public function getCreated_at(): string
    {
        return $this->attributes['created_at'];
    }

    public function setCreated_at(string $desc): void
    {
        $this->attributes['created_at'] = $desc;
    }

    public function getUpdated_at(): string
    {
        return $this->attributes['updated_at'];
    }

    public function setUpdated_at(string $desc): void
    {
        $this->attributes['updated_at'] = $desc;
    }

    public function getTypeId(): int
    {
        return $this->attributes['type_id'];
    }

    public function setTypeId(int $type_id): void
    {
        $this->attributes['type_id'] = $type_id;
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

    public function getType(): Type
    {
        return $this->type; 
    }

    public function setType($type): void
    {
        $this->type = $type;
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

    public static function validate($request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'stock' => 'required|numeric|gte:0',
            'photo' => 'required',
            'brand' => 'required',
            'price' => 'required|numeric|gt:0',
            'details' => 'required',
        ]);
    }
}
