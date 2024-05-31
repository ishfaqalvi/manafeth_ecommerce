<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class MaintenenceOperation
 *
 * @property $id
 * @property $maintenence_request_id
 * @property $actor_id
 * @property $actor_type
 * @property $action
 * @property $performed_at
 * @property $created_at
 * @property $updated_at
 *
 * @property MaintenenceRequest $maintenenceRequest
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class MaintenenceOperation extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['maintenence_request_id','actor_id','actor_type','action','performed_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function maintenenceRequest()
    {
        return $this->hasOne('App\Models\MaintenenceRequest', 'id', 'maintenence_request_id');
    }

    /**
     * Get the owning actor model (Customer, Employee, or User).
     */
    public function actor()
    {
        return $this->morphTo();
    }
}
