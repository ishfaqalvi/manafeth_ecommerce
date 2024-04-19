<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class PromoCode
 *
 * @property $id
 * @property $title
 * @property $code
 * @property $discount_type
 * @property $discount_value
 * @property $valid_from
 * @property $valid_until
 * @property $usage_limit
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class PromoCode extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title','code','discount_type','discount_value','valid_from','valid_until','usage_limit','status'];



}
