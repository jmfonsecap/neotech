<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Order;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     * USER ATTRIBUTES
     * $this->attributes['id'] - int - contains the user primary key (id)
     * $this->attributes['name'] - string - contains the user name
     * $this->attributes['email'] - string - contains the user email
     * $this->attributes['email_verified_at'] - timestamp - contains the user email verification date
     * $this->attributes['password'] - string - contains the user password
     * $this->attributes['remember_token'] - string - contains the user password
     * $this->attributes['role'] - string - contains the user role (client or admin)
     * $this->attributes['phone'] - string - contains the user balance
     * $this->attributes['address'] - string - contains the user address
     * $this->attributes['postalCode'] - string - contains the user postal code
     * $this->attributes['country'] - string - contains the user country
     * $this->attributes['points'] - int - contains the user points
     * $this->orders - Order[] - contains the associated orders 
     * $this->attributes['created_at'] - timestamp - contains the user creation date
     * $this->attributes['updated_at'] - timestamp - contains the user update date
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'image',
        'name',
        'email',
        'password',
        'role',
        'phone',
        'address',
        'postalCode',
        'country',
        'points',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getLabels()
    {
        $colums = [
            'name',
            'email',
            'role',
            'phone',
            'country',
            'actions',
        ];

        return $colums;
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function setId($id): void
    {
        $this->attributes['id'] = $id;
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setName($name): void
    {
        $this->attributes['name'] = $name;
    }

    public function getRole(): string
    {
        return $this->attributes['role'];
    }

    public function setRole($role): void
    {
        $this->attributes['role'] = $role;
    }

    public function getImage()
    {
        return $this->attributes['image'];
    }

    public function setImage($image): void
    {
        $this->attributes['image'] = $image;
    }

    public function getEmail(): string
    {
        return $this->attributes['email'];
    }

    public function setEmail($email): void
    {
        $this->attributes['email'] = $email;
    }

    public function getPassword(): string
    {
        return $this->attributes['password'];
    }

    public function setPassword($password): void
    {
        $this->attributes['password'] = $password;
    }

    public function getPhone(): string
    {
        return $this->attributes['phone'];
    }

    public function setPhone($phone): void
    {
        $this->attributes['phone'] = $phone;
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function setCreatedAt($createdAt): void
    {
        $this->attributes['created_at'] = $createdAt;
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    public function setUpdatedAt($updatedAt): void
    {
        $this->attributes['updated_at'] = $updatedAt;
    }

    public function getAddress(): string
    {
        return $this->attributes['address'];
    }

    public function setAddress($address): void
    {
        $this->attributes['address'] = $address;
    }

    public function getPostalCode(): string
    {
        return $this->attributes['postalCode'];
    }

    public function setPostalCode($postalCode): void
    {
        $this->attributes['postalCode'] = $postalCode;
    }

    public function getCountry(): string
    {
        return $this->attributes['country'];
    }

    public function setCountry($country): void
    {
        $this->attributes['country'] = $country;
    }

    public function getPoints(): int
    {
        return $this->attributes['points'];
    }

    public function setPoints($points): void
    {
        $this->attributes['points'] = $points;
    }

    //Relations

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function getOrders(): Collection
    {
        return $this->orders;
    }

    public function setOrders(Collection $orders): void
    {
        $this->orders = $orders;
    }

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
        $this->orders = $reviews;
    }
}
