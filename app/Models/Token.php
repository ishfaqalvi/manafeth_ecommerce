<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Carbon\Carbon;

/**
 * Class Token
 *
 * @property $id
 * @property $email
 * @property $otp
 * @property $expiry_time
 * @property $used
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Token extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $dates = ['expiry_time'];

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
    protected $fillable = ['email','mobile_number','otp','expiry_time','used'];

    /**
     * Check if a valid OTP exists for the given email or mobile number.
     *
     * @param string|null $email
     * @param string|null $mobileNumber
     * @return bool
     */
    public static function hasValidOtp($email = null, $mobileNumber = null)
    {
        $otpToken = self::when($email, function($query, $email) {
                                return $query->where('email', $email);
                            })
                            ->when($mobileNumber, function($query, $mobileNumber) {
                                return $query->where('mobile_number', $mobileNumber);
                            })
                            ->where('expiry_time', '>', Carbon::now())
                            ->where('used', false)
                            ->first();

        return $otpToken !== null;
    }

    /**
     * Check if the given OTP is valid for the given email or mobile number.
     *
     * @param string|null $email
     * @param string|null $mobileNumber
     * @param string $otp
     * @return bool
     */
    public static function isValidOtp($email = null, $mobileNumber = null, $otp)
    {
        $otpToken = self::when($email, function($query, $email) {
                                return $query->where('email', $email);
                            })
                            ->when($mobileNumber, function($query, $mobileNumber) {
                                return $query->where('mobile_number', $mobileNumber);
                            })
                            ->where('otp', $otp)
                            ->where('expiry_time', '>', Carbon::now())
                            ->where('used', false)
                            ->first();

        return $otpToken !== null;
    }
}
