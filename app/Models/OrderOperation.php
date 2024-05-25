<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class OrderOperation
 *
 * @property $id
 * @property $order_id
 * @property $actor_id
 * @property $actor_type
 * @property $action
 * @property $performed_at
 * @property $created_at
 * @property $updated_at
 *
 * @property Order $order
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class OrderOperation extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['order_id','actor_id','actor_type','action','performed_at'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function order()
    {
        return $this->hasOne('App\Models\Order', 'id', 'order_id');
    }

    /**
     * Get the owning actor model (Customer, Employee, or User).
     */
    public function actor()
    {
        return $this->morphTo();
    }
}
