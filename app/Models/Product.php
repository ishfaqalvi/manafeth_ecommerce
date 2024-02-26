<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class Product
 *
 * @property $id
 * @property $brand_id
 * @property $category_id
 * @property $sub_category_id
 * @property $name
 * @property $description
 * @property $detail
 * @property $thumbnail
 * @property $quantity
 * @property $price
 * @property $rent
 * @property $maintenance
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @property Brand $brand
 * @property Category $category
 * @property SubCategory $subCategory
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Product extends Model implements Auditable
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
    protected $fillable = [
        'brand_id',
        'category_id',
        'sub_category_id',
        'name',
        'serial_number',
        'engine_number',
        'model',
        'thumbnail',
        'quantity',
        'price',
        'rent',
        'maintenance',
        'status',
        'description',
        'detail'
    ];

    /**
     * The set attributes.
     *
     * @var array
     */
    public function setThumbnailAttribute($image)
    {
        if ($image instanceof \Illuminate\Http\UploadedFile) {
            $this->attributes['thumbnail'] = uploadFile($image, 'product', '400', '400');
        } elseif (is_string($image)) {
            $this->attributes['thumbnail'] = $image;
        } else {
            unset($this->attributes['thumbnail']);
        }
    }

    /**
     * The get attributes.
     *
     * @var array
     */
    public function getThumbnailAttribute($image)
    {
        if($image){ return asset($image); }
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function brand()
    {
        return $this->hasOne('App\Models\Brand', 'id', 'brand_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category()
    {
        return $this->hasOne('App\Models\Category', 'id', 'category_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function subCategory()
    {
        return $this->hasOne('App\Models\SubCategory', 'id', 'sub_category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function features()
    {
        return $this->hasMany('App\Models\ProductFeature', 'product_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function specifications()
    {
        return $this->hasMany('App\Models\ProductSpecification', 'product_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function resources()
    {
        return $this->hasMany('App\Models\ProductResource', 'product_id', 'id');
    }
}
