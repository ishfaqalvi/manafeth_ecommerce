<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class RentCart
 *
 * @property $id
 * @property $customer_id
 * @property $product_id
 * @property $quantity
 * @property $from
 * @property $to
 * @property $created_at
 * @property $updated_at
 *
 * @property Customer $customer
 * @property Product $product
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class RentCart extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['customer_id','product_id','quantity','from','to'];

    /**
     * Interact with the date.
     */
    public function setFromAttribute($value)
    {
        $this->attributes['from'] = strtotime($value);
    }

    /**
     * Interact with the date.
     */
    public function setToAttribute($value)
    {
        $this->attributes['to'] = strtotime($value);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function customer()
    {
        return $this->hasOne('App\Models\Customer', 'id', 'customer_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function product()
    {
        return $this->hasOne('App\Models\Product', 'id', 'product_id');
    }
    

}
