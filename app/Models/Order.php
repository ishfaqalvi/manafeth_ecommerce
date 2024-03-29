<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class Order
 *
 * @property $id
 * @property $customer_id
 * @property $name
 * @property $email
 * @property $phone_number
 * @property $address
 * @property $created_at
 * @property $updated_at
 *
 * @property Customer $customer
 * @property OrderDetail[] $orderDetails
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Order extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['customer_id','payment_method','name','email','phone_number','address','status'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function customer()
    {
        return $this->hasOne('App\Models\Customer', 'id', 'customer_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function details()
    {
        return $this->hasMany('App\Models\OrderDetail', 'order_id', 'id');
    }
}
