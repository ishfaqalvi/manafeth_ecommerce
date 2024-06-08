<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class RentRequestDetail
 *
 * @property $id
 * @property $request_id
 * @property $product_id
 * @property $quantity
 * @property $from
 * @property $to
 * @property $created_at
 * @property $updated_at
 *
 * @property Product $product
 * @property RentRequest $rentRequest
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class RentRequestDetail extends Model implements Auditable
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
    protected $fillable = ['request_id','product_id','quantity','from','to', 'star', 'remarks'];

    /**
     * Interact with the date.
     */
    // public function setFromAttribute($value)
    // {
    //     $this->attributes['from'] = strtotime($value);
    // }

    /**
     * Interact with the date.
     */
    // public function setToAttribute($value)
    // {
    //     $this->attributes['to'] = strtotime($value);
    // }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function product()
    {
        return $this->hasOne('App\Models\Product', 'id', 'product_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function rentRequest()
    {
        return $this->hasOne('App\Models\RentRequest', 'id', 'request_id');
    }
}
