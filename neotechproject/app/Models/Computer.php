<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Computer extends Model
{
    /**
     * The attributes that are mass assignable.
     * COMPUTER ATTRIBUTES
     * $this->attributes['id'] - int - contains the computer primary key (id)
     * $this->attributes['name'] - string - contains the computer name
     * $this->attributes['stock'] - int - contains the computer stock
     * $this->attributes['photo'] - string - contains the url for the computer photo
     * $this->attributes['brand'] - string - contains the computer brand
     * $this->attributes['category'] - string - contains the computer category
     * $this->attributes['keywords'] - string[] - contains the keywords related to the computer
     * $this->attributes['currentPrice'] - int - contains the computer current price
     * $this->attributes['lastPrice'] - int - contains the computer previous price in case of a discount
     * $this->attributes['details'] - string - contains the computer details
     * $this->attributes['discount'] - bool - defines if the computer is on discount or not
     * $this->attributes['items'] - Items[] - contains the computer items
     * $this->attributes['reviews'] - Review[] - contains the computer reviews
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'stock',
        'photo',
        'brand',
        'category',
        'keywords',
        'currentPrice',
        'lastPrice',
        'details',
        'discount',
        'parts',
        'reviews',
    ];

    public function getLabels()
    {
        $colums = [
            'name',
            'stock',
            'brand',
            'category',
            'price',
            'actions',
        ];

        return $colums;
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function setId(int $id): void
    {
        $this->attributes['id'] = $id;
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setName(string $name)
    {
        $this->attributes['name'] = $name;
    }

    public function getStock(): int
    {
        return $this->attributes['stock'];
    }

    public function setStock(int $stock)
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

    public function setBrand(string $brand)
    {
        $this->attributes['brand'] = $brand;
    }

    public function getCategory(): string
    {
        return $this->attributes['category'];
    }

    public function setCategory(string $category)
    {
        $this->attributes['category'] = $category;
    }

    public function getKeywords()
    {
        return $this->attributes['keywords'];
    }

    public function setKeywords($keywords)
    {
        $this->attributes['keywords'] = $keywords;
    }

    public function getCurrentPrice(): int
    {
        return $this->attributes['currentPrice'];
    }

    public function setCurrentPrice(int $currentPrice)
    {
        $this->attributes['currentPrice'] = $currentPrice;
    }

    public function getLastPrice(): int
    {
        return $this->attributes['lastPrice'];
    }

    public function setLastPrice(int $lastPrice)
    {
        $this->attributes['lastPrice'] = $lastPrice;
    }

    public function getDetails(): string
    {
        return $this->attributes['details'];
    }

    public function setDetails(string $details)
    {
        $this->attributes['details'] = $details;
    }

    public function getDiscount(): bool
    {
        return $this->attributes['discount'];
    }

    public function setDiscount(bool $discount)
    {
        $this->attributes['discount'] = $discount;
    }

    //Relations

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function getReviews(): Collection
    {
        return $this->reviews;
    }

    public function setReviews(Collection $reviews): void
    {
        $this->reviews = $reviews;
    }

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
            'name' => 'required',
            'stock' => 'required',
            'brand' => 'required',
            'category' => 'required',
            'keywords' => 'required',
            'currentPrice' => 'required',
            'lastPrice',
            'details' => 'required',
            'discount',
            'photo',
        ]);
    }
}
