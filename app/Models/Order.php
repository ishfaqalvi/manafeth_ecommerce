<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class Order
 *
 * @property $id
 * @property $customer_id
 * @property $name
 * @property $email
 * @property $phone_number
 * @property $address
 * @property $created_at
 * @property $updated_at
 *
 * @property Customer $customer
 * @property OrderDetail[] $orderDetails
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Order extends Model implements Auditable
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
        'invoice_no',
        'customer_id',
        'payment_method',
        'on_delivery_payment_method',
        'collection_type',
        'collection_date',
        'time_slot_id',
        'discount',
        'payment',
        'name',
        'email',
        'phone_number',
        'address',
        'lat',
        'long',
        'invoice',
        'status'
    ];

    /**
     * Attributes that should auto genereted.
     *
     * @var array
     */
    // protected static function boot()
    // {
    //     parent::boot();
    //     static::created(function ($model) {
    //         $model->invoice_no = '#-' . str_pad($model->id, 6, "0", STR_PAD_LEFT);
    //         $model->save();
    //     });
    // }

    /**
     * Interact with the date.
     */
    public function setCollectionDateAttribute($value)
    {
        $this->attributes['collection_date'] = strtotime($value);
    }

    /**
     * Interact with the date.
     */
    public function setInvoiceAttribute($file)
    {
        if($file){
            $name = $file->getClientOriginalName();
            $file->move('uploads/orders', $name);
            $this->attributes['invoice'] = 'uploads/orders/'.$name;
        }else{
            unset($this->attributes['invoice']);
        }

    }

    /**
     * The get attributes.
     *
     * @var array
     */
    public function getInvoiceAttribute($invoice)
    {
        return isset($invoice) ? asset($invoice) : '';
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
    public function timeSlot()
    {
        return $this->hasOne('App\Models\TimeSlot', 'id', 'time_slot_id');
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function details()
    {
        return $this->hasMany('App\Models\OrderDetail', 'order_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function operations()
    {
        return $this->hasMany('App\Models\OrderOperation', 'order_id', 'id');
    }

    /**
     * Get all of the payments.
     */
    public function payments()
    {
        return $this->morphMany(Payment::class, 'orderable');
    }
}
