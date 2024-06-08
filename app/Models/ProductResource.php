<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class ProductResource
 *
 * @property $id
 * @property $product_id
 * @property $type
 * @property $file
 * @property $created_at
 * @property $updated_at
 *
 * @property Product $product
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ProductResource extends Model implements Auditable
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
    protected $fillable = ['product_id','type','name','file'];

    /**
     * The set attributes.
     *
     * @var array
     */
    public function setFileAttribute($file)
    {
        if ($file instanceof \Illuminate\Http\UploadedFile) {
            $name = $file->getClientOriginalName();
            $file->move('images/product/resource', $name);
            $this->attributes['file'] = 'images/product/resource/'.$name;
        } else {
            unset($this->attributes['file']);
        }
    }

    /**
     * The get attributes.
     *
     * @var array
     */
    public function getFileAttribute($file)
    {
        if($file){ return asset($file); }
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function product()
    {
        return $this->hasOne('App\Models\Product', 'id', 'product_id');
    }
}
