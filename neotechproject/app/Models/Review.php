<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    /* REVIEW ATTRIBUTES

    * $this->attributes['id'] - int - contains the review's primary key (id)
    * $this->attributes['rating'] - int - computer's calification from 1 to 5.
    * $this->attributes['description'] - string - contains the review's description
    * $this->attributes['created_at'] - string (timestamp in the DB) - contains the date when the part was created
    * $this->attributes['updated_at'] - string (timestamp in the DB) - contains the last date when the part was modified
    * $this->computer - Computer - contains the Computer that was reviewed
    * $this->attributes['computer_id'] - int - contains the related computer's primary key (id)
    * $this->user - User - contains the user who reviewed
    * $this->attributes['user_id'] - int - contains the ID of the user who reviewed
    */

    protected $fillable = ['rating', 'description', 'computer_id'];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getRating(): int
    {
        return $this->attributes['rating'];
    }

    public function setRating(int $rating): void
    {
        $this->attributes['rating'] = $rating;
    }

    public function getDescription(): string
    {
        return $this->attributes['description'];
    }

    public function setDescription(string $desc): void
    {
        $this->attributes['description'] = $desc;
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

    public function getComputerId(): int
    {
        return $this->attributes['computer_id'];
    }

    public function setComputerId(int $computer_id): void
    {
        $this->attributes['computer_id'] = $computer_id;
    }

    public function computer(): BelongsTo
    {
        return $this->belongsTo(Computer::class, 'id');
    }

    public function getComputer(): Computer
    {
        return $this->computer;
    }

    public function setComputer($computer): void
    {
        $this->computer_id = $computer;
    }

    public function getLabels()
    {
        $colums = [
            'ID',
            'Computer reviewed (ID)',
            'Rating',
            'Description',
            'Actions',
        ];

        return $colums;
    }

         public static function validate($request)
         {
             $request->validate([
                 'rating' => 'required|numeric|gte:0|lte:5',
                 'description' => 'required',
             ]);
         }
}
