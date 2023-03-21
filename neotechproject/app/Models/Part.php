<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{

    /**
     * PART ATTRIBUTES

     * $this->attributes['id'] - int - contains the PART primary key (id)
     * $this->attributes['name'] - string - contains the part name
     * $this->attributes['stock'] - int - contains the quantity of this reference in stock
     * $this->attributes['brand'] - string - contains the part's brand
     * $this->attributes['type'] - string - contains the type of part
     * $this->attributes['price'] - int - contains the price of the part
     * $this->attributes['details'] - string - contains a description and details of the part
     * $this->attributes['created_at'] - string (timestamp in the DB) - contains the date when the part was created
     * $this->attributes['updated_at'] - string (timestamp in the DB) - contains the last date when the part was modified
     * 
     $request->validate([
            'name' => 'required',
            'stock' => 'required',
            'brand' => 'required',
            'part_type' => 'required',
            'price' => 'required',
            'details' => 'required',
        ]);

     
     */
    protected $fillable = ['stock', 'name', 'brand', 'type', 'price', 'details'];

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

    public function getBrand(): string
    {
        return $this->attributes['brand'];
    }

    public function setBrand(string $desc): void
    {
        $this->attributes['brand'] = $desc;
    }

    public function getType(): string
    {
        return $this->attributes['type'];
    }

    public function setType(string $desc): void
    {
        $this->attributes['type'] = $desc;
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

    //It was necessary to use the underscore because serCreatedAt is an Eloquent 
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

    public static function validate($request)
    {
    $request->validate([
    "name" => "required|max:255",
    "stock" => "required|numeric|gte:0",
    "brand" => "required",
    "type" => "required",
    "price" => "required|numeric|gt:0",
    "details" => "required",
    ]);
    }
}