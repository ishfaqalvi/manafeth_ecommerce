<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class MaintenenceRequest
 *
 * @property $id
 * @property $customer_id
 * @property $first_name
 * @property $last_name
 * @property $phone_number
 * @property $address
 * @property $category_id
 * @property $product_id
 * @property $message
 * @property $images
 * @property $created_at
 * @property $updated_at
 *
 * @property Category $category
 * @property Customer $customer
 * @property Product $product
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class MaintenenceRequest extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    
    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'request_no',
        'customer_id',
        'first_name',
        'last_name',
        'phone_number',
        'address',
        'category_id',
        'product_id',
        'message',
        'images',
        'status'
    ];

    /**
     * Attributes that should auto genereted.
     *
     * @var array
     */
    protected static function boot()
    {
        parent::boot();
        static::created(function ($model) { 
            $model->request_no = '#-' . str_pad($model->id, 6, "0", STR_PAD_LEFT);
            $model->save();
        });
    }

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
                $file->move('images/maintenence/', $name);
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
                $images[] = asset('images/maintenence/'.$value); 
            }
        }
        return $images;
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
    public function customer()
    {
        return $this->hasOne('App\Models\Customer', 'id', 'customer_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function product()
    {
        return $this->hasOne('App\Models\Product', 'id', 'product_id');
    }
}
