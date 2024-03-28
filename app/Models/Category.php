<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class Category
 *
 * @property $id
 * @property $name
 * @property $image
 * @property $created_at
 * @property $updated_at
 *
 * @property SubCategory[] $subCategories
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Category extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->perPage = settings('per_page_items') ? : 15;
    }

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','image','banner'];

    /**
     * The set attributes.
     *
     * @var array
     */
    public function setImageAttribute($image)
    {
        if ($image) {
            $this->attributes['image'] = uploadFile($image, 'brand', '200', '200');
        } else {
            unset($this->attributes['image']);
        }
    }

    /**
     * The set attributes.
     *
     * @var array
     */
    public function setBannerAttribute($image)
    {
        if ($image) {
            $this->attributes['banner'] = uploadFile($image, 'brand', '200', '200');
        } else {
            unset($this->attributes['banner']);
        }
    }

    /**
     * The get attributes.
     *
     * @var array
     */
    public function getImageAttribute($value)
    {
        return isset($value) ? asset($value) : '';
    }

    /**
     * The get attributes.
     *
     * @var array
     */
    public function getBannerAttribute($value)
    {
        return isset($value) ? asset($value) : '';
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subCategories()
    {
        return $this->hasMany('App\Models\SubCategory', 'category_id', 'id');
    }
}
