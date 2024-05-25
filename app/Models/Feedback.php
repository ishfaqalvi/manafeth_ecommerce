<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class Feedback
 *
 * @property $id
 * @property $email
 * @property $phone_number
 * @property $remarks
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Feedback extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $table = 'feedbacks';

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['email','phone_number','remarks'];



}
