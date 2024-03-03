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
        'discount',
        'rent',
        'special',
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
     * Scope a query to filter product.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $category
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilter($query, $request)
    {
        if (isset($request['brand'])) {
            $brand = $request['brand'];
            $query->whereHas('brand', function ($query) use ($brand) {
                $query->whereName($brand);
            });
        }
        if (isset($request['category'])) {
            $category = $request['category'];
            $query->whereHas('category', function ($query) use ($category) {
                $query->whereName($category);
            });
        }
        if (isset($request['sub_category'])) {
            $subCategory = $request['sub_category'];
            $query->whereHas('subCategory', function ($query) use ($subCategory) {
                $query->whereName($subCategory);
            });
        }
        if (isset($request['model'])) {
            $query->whereModel($request['model']);
        }
        if (isset($request['type'])) {
            if($request['type'] == 'Rent'){
                $query->whereRent('Yes');
            }elseif($request['type'] == 'Maintenance'){
                $query->whereMaintenance('Yes');
            }
        }
        if(isset($request['special'])){
            $query->whereSpecial('Yes');
        }
        if (isset($request['model'])) {
            $query->whereModel($request['model']);
        }
        if (isset($request['search'])) {
            $query->where('name', 'like', '%'.$request['search'].'%')
            ->orWhere('description', 'like', '%'.$request['search'].'%');
        }
        return $query;
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany('App\Models\ProductImage', 'product_id', 'id');
    }
}
