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
    protected $fillable = ['employee_id','task_type','employee_service','task_id','remarks','images','status'];

    /**
     * Set the images's.
     *
     * @param  string  $value
     * @return void
     */
    public function setImagesAttribute($values) {
        if($values) {
            $images = array();
            foreach($values as $file)
            {
                $name = $file->getClientOriginalName();
                $file->move('images/task/', $name);
                $images[] = $name;
            }
            $this->attributes['images'] = implode(',', $images);
        }else{
            unset($this->attributes['images']);
        }
    }

    /**
     * Get the image's.
     *
     * @param  string  $value
     * @return void
     */
    public function getImagesAttribute($values){
        $images = array();
        if ($values) {
            foreach (explode(',', $values) as $key => $value) {
                $images[] = asset('images/task/'.$value);
            }
        }
        return $images;
    }

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

    /**
     * Define a relationship for Order task details.
     */
    public function order()
    {
        return $this->hasOne('App\Models\Order', 'id', 'task_id');
    }

    /**
     * Define a relationship for MaintenenceRequest task details.
     */
    public function maintenenceRequest()
    {
        return $this->hasOne('App\Models\MaintenenceRequest', 'id', 'task_id');
    }

    /**
     * Define a relationship for RentRequest task details.
     */
    public function rentRequest()
    {
        return $this->hasOne('App\Models\RentRequest', 'id', 'task_id');
    }
}
