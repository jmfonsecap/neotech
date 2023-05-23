<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CustomComputer extends Model
{
    /**
     * The attributes that are mass assignable.
     * CUSTOM COMPUTER ATTRIBUTES
     * $this->attributes['id'] - int - contains the custom computer primary key (id)
     * $this->attributes['name'] - string - contains the custom computer name
     * $this->attributes['price'] - int - contains the custom computer price
     * $this->attributes['created_at'] - string (timestamp in the DB) - contains the date when the custom computer was created
     * $this->attributes['updated_at'] - string (timestamp in the DB) - contains the last date when the custom computer was modified
     * $this->attributes['parts'] - Part[] - contains the custom computer parts
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'price',
    ];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setName(string $name): void
    {
        $this->attributes['name'] = $name;
    }

    public function getPrice(): int
    {
        return $this->attributes['price'];
    }

    public function setPrice(int $price): void
    {
        $this->attributes['price'] = $price;
    }

    //Relations

    public function parts(): BelongsToMany
    {
        return $this->belongsToMany(Part::class)->withTimestamps();
    }

    public function getParts(): Collection
    {
        return $this->parts;
    }

    public function setParts(Collection $parts): void
    {
        $this->parts = $parts;
    }

    public function getUserId(): int
    {
        return $this->attributes['user_id'];
    }

    public function setUserId(int $user_id): void
    {
        $this->attributes['user_id'] = $user_id;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getUser(): User
    {
        return $this->user; 
    }

    public function setUser($user): void
    {
        $this->user = $user;
    }

    public static function validate($request)
    {
        $request->validate([
            'name' => 'required',
        ]);
    }
}
