<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MaintenenceBoy
 *
 * @property $id
 * @property $maintenence_request_id
 * @property $employee_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Employee $employee
 * @property MaintenenceRequest $maintenenceRequest
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class MaintenenceBoy extends Model
{
    

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['maintenence_request_id', 'employee_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo(\App\Models\Employee::class, 'employee_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function maintenenceRequest()
    {
        return $this->belongsTo(\App\Models\MaintenenceRequest::class, 'maintenence_request_id', 'id');
    }
    

}
