<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class OrderDetailService
 *
 * @property $id
 * @property $order_detail_id
 * @property $date
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @property OrderDetail $orderDetail
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class OrderDetailService extends Model implements Auditable
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
    protected $fillable = ['order_detail_id','date','status'];

    /**
     * Interact with the date.
     */
    public function setDateAttribute($value)
    {
        $this->attributes['date'] = strtotime($value);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function orderDetail()
    {
        return $this->hasOne('App\Models\OrderDetail', 'id', 'order_detail_id');
    }
}
