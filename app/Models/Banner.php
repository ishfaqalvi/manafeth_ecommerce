<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class Banner
 *
 * @property $id
 * @property $title
 * @property $image
 * @property $order
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Banner extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title','image','order','type','status'];

    protected static function booted()
    {
        static::creating(function ($banner) {
            $highestOrder = Banner::max('order');
            $banner->order = $highestOrder + 1;
        });
    }

    /**
     * The set attributes.
     *
     * @var array
     */
    public function setImageAttribute($image)
    {
        if($image){
            $this->attributes['image'] = uploadFile($image, 'banner', '1836', '936');
        }else{
            unset($this->attributes['image']);
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
     * Scope a query to filter product.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $category
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilter($query, $request)
    {
        if (isset($request['type'])) {
            $query->whereType($request['type']);
        }
        return $query;
    }
}