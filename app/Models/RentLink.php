<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class RentLink
 *
 * @property $id
 * @property $product_id
 * @property $product_rent_id
 * @property $quantity
 * @property $from
 * @property $to
 * @property $token
 * @property $created_at
 * @property $updated_at
 *
 * @property ProductRent $productRent
 * @property Product $product
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class RentLink extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

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
    protected $fillable = ['title','product_id','product_rent_id','quantity','from','to','token'];

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
    public function productRent()
    {
        return $this->hasOne('App\Models\ProductRent', 'id', 'product_rent_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function product()
    {
        return $this->hasOne('App\Models\Product', 'id', 'product_id');
    }
}
