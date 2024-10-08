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
 * @property $features
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

    protected $appends = ['web_page_url'];

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
        'warranty',
        'maintenance',
        'price',
        'discount',
        'delivery_charges',
        'type',
        'special',
        'status',
        'description',
        'features'
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
     * The get attributes.
     *
     * @var array
     */
    public function getWebPageUrlAttribute()
    {
        return route("web.products.sale", $this->id);
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
            $query->whereBrandId($request['brand']);
        }
        if (isset($request['category'])) {
            $query->whereCategoryId($request['category']);
        }
        if (isset($request['sub_category'])) {
            $query->whereSubCategoryId($request['sub_category']);
        }
        if (isset($request['model'])) {
            $query->whereModel($request['model']);
        }
        if (isset($request['status'])) {
            $query->whereStatus($request['status']);
        }
        if (isset($request['min_price'])) {
            $query->where('price', '>=', $request['min_price']);
        }
        if (isset($request['max_price'])) {
            $query->where('price', '<=', $request['max_price']);
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rents()
    {
        return $this->hasMany('App\Models\ProductRent', 'product_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews()
    {
        return $this->hasMany('App\Models\OrderDetail', 'product_id', 'id')->whereNotNull('star');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function rentDetails()
    {
        return $this->hasMany('App\Models\RentRequestDetail', 'product_id', 'id');
    }
}
