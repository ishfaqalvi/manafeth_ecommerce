<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class TimeSlot
 *
 * @property $id
 * @property $name
 * @property $start_time
 * @property $end_time
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TimeSlot extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;



    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['type','name','start_time','end_time','status'];
}
