<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
//use App\Models\Computer;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory;

/**

* PRODUCT ATTRIBUTES

* $this->attributes['id'] - int - contains the review's primary key (id)
* $this->attributes['rating'] - int - computer's calification from 1 to 5.
* $this->attributes['description'] - string - contains the review's description
* $this->user - User - contains the User who wrote the review
* $this->computer - Computer - contains the Computer that was reviewed
*/

protected $fillable = ['rating', 'description'];

public function getId(): int
{
return $this->attributes['id'];
}

public function setId(int $id): void
{
$this->attributes['id'] = $id;
}

public function getDescription(): string
{
return $this->attributes['description'];
}

public function setDescription(string $desc): void
{
$this->attributes['description'] = $desc;
}

public function getUsername(): int
{
return $this->attributes['username'];
}

public function setUsername(int $cId): void
{
$this->attributes['username'] = $cId;
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

/*
public function getComputerId(): int
{
return $this->attributes['computer_id'];
}

public function setComputerId(int $cId): void
{
$this->attributes['computer_id'] = $cId;
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
 */

 public static function validate($request)
    {
        $request->validate([
            'rating' => 'required|numeric|gte:0|lte:5',
            'description' => 'required',
        ]);
    }

}
