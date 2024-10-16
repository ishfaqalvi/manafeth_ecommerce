<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class Customer
 *
 * @property $id
 * @property $name
 * @property $email
 * @property $password
 * @property $mobile_number
 * @property $address
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Customer extends Authenticatable implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    use HasApiTokens;

    protected $guard = 'customers';

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->perPage = settings('per_page_items') ?: 15;
    }

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'name',
        'email',
        'mobile_number',
        'fcm_token',
        'password',
        'email_verified_at',
        'address',
        'image',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime'
    ];

    /**
     * The set attributes.
     *
     * @var array
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    /**
     * The set attributes.
     *
     * @var array
     */
    public function setImageAttribute($image)
    {
        if ($image) {
            $this->attributes['image'] = uploadFile($image, 'profile', '100', '100');
        } else {
            unset($this->attributes['image']);
        }
    }

    /**
     * The get attributes.
     *
     * @var array
     */
    public function getImageAttribute($image)
    {
        return isset($image) ? asset($image) : '';
    }

    /**
     * Scope a query to filter product.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $category
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilter($query, $request)
    {
        if (isset($request['status'])) {
            $query->whereStatus($request['status']);
        }
        if (isset($request['search'])) {
            $query->where('name', 'like', '%'.$request['search'].'%')
            ->orWhere('email', 'like', '%'.$request['search'].'%')
            ->orWhere('mobile_number', 'like', '%'.$request['search'].'%');
        }
        return $query;
    }

    /**
     * Get all of the customer's order operations.
     */
    public function orderOperations()
    {
        return $this->morphMany(OrderOperation::class, 'actor');
    }

    /**
     * Get all of the customer's order operations.
     */
    public function rentOperations()
    {
        return $this->morphMany(RentRequestOperation::class, 'actor');
    }

    /**
     * Get all of the customer's order operations.
     */
    public function maintenenceOperations()
    {
        return $this->morphMany(MaintenenceOperation::class, 'actor');
    }

    /**
     * Get all of the customer's fcm notifications
     */
    public function fcmNotifications()
    {
        return $this->morphMany(FcmNotification::class, 'user');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOMany     
     * */
    public function addresses()
    {
        return $this->hasMany('App\Models\Address', 'customer_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function favouriteProducts()
    {
        return $this->hasMany('App\Models\FavouriteProduct', 'customer_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function carts()
    {
        return $this->hasMany('App\Models\Cart', 'customer_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany('App\Models\Order', 'customer_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function maintenenceRequests()
    {
        return $this->hasMany('App\Models\MaintenenceRequest', 'customer_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rentCarts()
    {
        return $this->hasMany('App\Models\RentCart', 'customer_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rentRequests()
    {
        return $this->hasMany('App\Models\RentRequest', 'customer_id', 'id');
    }

    /**
     * Get all of the user links.
     */
    public function rentLinks()
    {
        return $this->morphMany(RentLink::class, 'linkable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function coupons()
    {
        return $this->hasMany('App\Models\Coupon', 'customer_id', 'id');
    }
}
