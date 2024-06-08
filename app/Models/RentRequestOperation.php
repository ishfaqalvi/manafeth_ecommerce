<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class RentRequestOperation
 *
 * @property $id
 * @property $rent_request_id
 * @property $actor_id
 * @property $actor_type
 * @property $action
 * @property $performed_at
 * @property $created_at
 * @property $updated_at
 *
 * @property RentRequest $rentRequest
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class RentRequestOperation extends Model implements Auditable
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
    protected $fillable = ['rent_request_id','actor_id','actor_type','action','performed_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function rentRequest()
    {
        return $this->hasOne('App\Models\RentRequest', 'id', 'rent_request_id');
    }

    /**
     * Get the owning actor model (Customer, Employee, or User).
     */
    public function actor()
    {
        return $this->morphTo();
    }
}
