<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class Task
 *
 * @property $id
 * @property $employee_id
 * @property $task_type
 * @property $task_id
 * @property $remarks
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @property Employee $employee
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Task extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['employee_id','task_type','task_id','remarks','status'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function employee()
    {
        return $this->hasOne('App\Models\Employee', 'id', 'employee_id');
    }

    /**
     * Get the owning actor model (Customer, Employee, or User).
     */
    public function task()
    {
        return $this->morphTo();
    }
}
