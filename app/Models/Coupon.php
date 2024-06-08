<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class Coupon
 *
 * @property $id
 * @property $customer_id
 * @property $promo_code_id
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @property Customer $customer
 * @property PromoCode $promoCode
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Coupon extends Model implements Auditable
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
    protected $fillable = ['customer_id','promo_code_id','status'];


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
    public function promoCode()
    {
        return $this->hasOne('App\Models\PromoCode', 'id', 'promo_code_id');
    }


}
