<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class RentRequest
 *
 * @property $id
 * @property $customer_id
 * @property $first_name
 * @property $last_name
 * @property $phone_number
 * @property $address
 * @property $message
 * @property $created_at
 * @property $updated_at
 *
 * @property Customer $customer
 * @property RentRequestDetail[] $rentRequestDetails
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class RentRequest extends Model implements Auditable
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
        'customer_id',
        'payment_method',
        'on_delivery_payment_method',
        'collection_type',
        'collection_date',
        'time_slot_id',
        'discount',
        'payment',
        'payment_received',
        'name',
        'email',
        'phone_number',
        'address',
        'lat',
        'long',
        'status'
    ];

    /**
     * Interact with the date.
     */
    public function setCollectionDateAttribute($value)
    {
        if (!is_numeric($value)) {
            $this->attributes['collection_date'] = strtotime($value);
        } else {
            $this->attributes['collection_date'] = $value;
        }
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
            $query->where('name', 'like', '%'.$request['search'].'%')
            ->orWhere('phone_number', 'like', '%'.$request['search'].'%');
        }
        return $query;
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function details()
    {
        return $this->hasMany('App\Models\RentRequestDetail', 'request_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function operations()
    {
        return $this->hasMany('App\Models\RentRequestOperation', 'rent_request_id', 'id');
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
