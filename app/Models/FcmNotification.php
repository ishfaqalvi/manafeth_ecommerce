<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class FcmNotification
 *
 * @property $id
 * @property $title
 * @property $body
 * @property $image
 * @property $customer_id
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class FcmNotification extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title','body','topic','is_read','image','customer_id'];

    /**
     * The set attributes.
     *
     * @var array
     */
    public function setImageAttribute($image)
    {
        if ($image instanceof \Illuminate\Http\UploadedFile) {
            $name = $image->getClientOriginalName();
            $image->move('images/fcm', $name);
            $this->attributes['image'] = 'images/fcm/'.$name;
        } else {
            unset($this->attributes['image']);
        }
    }

    /**
     * The get attributes.
     *
     * @var array
     */
    public function getImageAttribute($image)
    {
        return isset($image) ? asset($image) : null;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function customer()
    {
        return $this->hasOne('App\Models\Customer', 'id', 'customer_id');
    }
}
