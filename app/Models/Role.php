<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class Role
 *
 * @property $id
 * @property $name
 * @property $guard_name
 * @property $created_at
 * @property $updated_at
 *
 * @property ModelHasRole $modelHasRole
 * @property RoleHasPermission[] $roleHasPermissions
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Role extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    static $rules = [
		'name' => 'required',
		'guard_name' => 'required',
    ];

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
    protected $fillable = ['name','guard_name'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function modelHasRole()
    {
        return $this->hasOne('App\Models\ModelHasRole', 'role_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function roleHasPermissions()
    {
        return $this->hasMany('App\Models\RoleHasPermission', 'role_id', 'id');
    }


}
