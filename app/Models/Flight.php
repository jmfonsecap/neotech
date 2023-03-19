<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
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
     
     */
    protected $fillable = ['name','take_off_time', 'arriving_time','take_off_place', 'destination', 'type', 'price'];

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

    public function getTakeOffTime(): string
    {
        return $this->attributes['take_off_time'];
    }

    public function setTakeOffTime(string $desc): void
    {
        $this->attributes['take_off_time'] = $desc;
    }

    public function getArrivingTime(): string
    {
        return $this->attributes['arriving_time'];
    }

    public function setArrivingTime(string $desc): void
    {
        $this->attributes['arriving_time'] = $desc;
    }

    public function getTakeOffPlace(): string
    {
        return $this->attributes['take_off_place'];
    }

    public function setTakeOffPlace(string $desc): void
    {
        $this->attributes['take_off_place'] = $desc;
    }

    public function getDestination(): string
    {
        return $this->attributes['destination'];
    }

    public function setDestination(string $desc): void
    {
        $this->attributes['destination'] = $desc;
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
    "takeOffTime" => "required|max:255",
    "arrivingTime" => "required|max:255",
    "take_off_place" => "required|max:255",
    "destination" => "required|max:255",
    "brand" => "required",
    "type" => "required",
    "price" => "required|numeric|gt:0",
    ]);
    }
}