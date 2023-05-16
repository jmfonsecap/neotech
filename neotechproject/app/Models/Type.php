<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Type extends Model
{
    /**
     * TYPE ATTRIBUTES

     * $this->attributes['id'] - int - contains the type primary key (id)
     * $this->attributes['name'] - string - contains the type name
     * $this->attributes['created_at'] - string (timestamp in the DB) - contains the date when the part was created
     * $this->attributes['updated_at'] - string (timestamp in the DB) - contains the last date when the part was modified
     * $this->attributes['parts'] - Part[] - contains the parts associated to this type
     */
    protected $fillable = ['name'];

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

    public function parts(): HasMany
    {
        return $this->hasMany(Part::class);
    }

    public function getParts(): Collection
    {
        return $this->parts;
    }

    public function setParts(Collection $parts): void
    {
        $this->parts = $parts;
    }

    public static function validate($request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);
    }
}
