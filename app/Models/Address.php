<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class Address
 *
 * @property $id
 * @property $customer_id
 * @property $full_name
 * @property $address_line1
 * @property $address_line2
 * @property $city
 * @property $state
 * @property $postal_code
 * @property $country
 * @property $phone_number
 * @property $email_address
 * @property $created_at
 * @property $updated_at
 *
 * @property Customer $customer
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Address extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['customer_id','full_name','phone_number','postal_code','city','state','country','address'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function customer()
    {
        return $this->hasOne('App\Models\Customer', 'id', 'customer_id');
    }
}
