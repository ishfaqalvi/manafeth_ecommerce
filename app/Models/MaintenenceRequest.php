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
        'request_no',
        'serial_number',
        'customer_id',
        'full_name',
        'phone_number',
        'address',
        'lat',
        'long',
        'category_id',
        'product_id',
        'payment',
        'payment_method',
        'on_delivery_payment_method',
        'payment_received',
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
     * Scope a query to filter orders.
     */
    public function scopeFilter($query, $request)
    {
        if (isset($request['customer'])) {
            $query->whereCustomerId($request['customer']);
        }
        if (isset($request['status'])) {
            $query->whereStatus($request['status']);
        }
        if (isset($request['search'])) {
            $query->where('full_name', 'like', '%'.$request['search'].'%')
            ->orWhere('phone_number', 'like', '%'.$request['search'].'%');
        }
        return $query;
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function operations()
    {
        return $this->hasMany('App\Models\MaintenenceOperation', 'maintenence_request_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function maintenenceBoys()
    {
        return $this->hasMany('App\Models\MaintenenceBoy', 'maintenence_request_id', 'id');
    }

    /**
     * Get all of the employee's order operations.
     */
    public function task()
    {
        return $this->morphOne(Task::class, 'task')->orderBy('id', 'desc')->limit(1);
    }

    /**
     * Get all of the employee's order operations.
     */
    public function runningTask()
    {
        return $this->morphOne(Task::class, 'task')->whereIn('status', ['Pending','Accepted','Ongoing'])->limit(1);
    }

    /**
     * Get all of the employee's order operations.
     */
    public function tasks()
    {
        return $this->morphMany(Task::class, 'task')->orderBy('id', 'desc');
    }

    /**
     * Get all of the payments.
     */
    public function payments()
    {
        return $this->morphMany(Payment::class, 'orderable');
    }
}
