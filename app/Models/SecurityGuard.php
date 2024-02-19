<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class SecurityGuard
 *
 * @property $id
 * @property $first_name
 * @property $last_name
 * @property $preferred_name
 * @property $email
 * @property $password
 * @property $licence_number
 * @property $licence_expiry_date
 * @property $home_address
 * @property $postal_address
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class SecurityGuard extends Authenticatable implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    use HasApiTokens;

    protected $guard = 'guards';

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'preferred_name',
        'email',
        'password',
        'licence_number',
        'licence_expiry_date',
        'home_address',
        'postal_address'
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
     * Interact with the date.
     */
    public function setLicenceExpiryDateAttribute($value)
    {
        $this->attributes['licence_expiry_date'] = strtotime($value);
    }

    /**
     * The set attributes.
     *
     * @var array
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}