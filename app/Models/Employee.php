<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Employee
 *
 * @property $id
 * @property $name
 * @property $email
 * @property $password
 * @property $mobile_number
 * @property $email_verified_at
 * @property $address
 * @property $image
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Employee extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasApiTokens;
    use HasFactory;

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
    protected $fillable = ['name','email','mobile_number','password','image','roles','fcm_token','status'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password'
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
            $this->attributes['image'] = uploadFile($image, 'employee', '100', '100');
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
     * The set attributes.
     *
     * @var array
     */
    public function setRolesAttribute($value)
    {
        $this->attributes['roles'] = implode(',', $value);
    }

    /**
     * The get attributes.
     *
     * @var array
     */
    public function getRolesAttribute($value)
    {
        return explode(',',$value);
    }

    /**
     * Get all of the employee's order operations.
     */
    public function orderOperations()
    {
        return $this->morphMany(OrderOperation::class, 'actor');
    }

    /**
     * Get all of the employee's order operations.
     */
    public function rentOperations()
    {
        return $this->morphMany(RentRequestOperation::class, 'actor');
    }

    /**
     * Get all of the employee's order operations.
     */
    public function maintenenceOperations()
    {
        return $this->morphMany(MaintenenceOperation::class, 'actor');
    }

    /**
     * Get all of the employee's fcm notifications.
     */
    public function fcmNotifications()
    {
        return $this->morphMany(FcmNotification::class, 'user');
    }

    /**
     * Get all of the employee's payments.
     */
    public function createdPayments()
    {
        return $this->morphMany(Payment::class, 'created_by');
    }
}
