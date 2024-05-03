<?php

namespace App\Repositories;
use App\Models\PromoCode;
use App\Contracts\CouponInterface;
use Illuminate\Support\Facades\Auth;

class CouponRepository implements CouponInterface
{
    public function promoCodeList($pagination = false)
    {
        $query = PromoCode::query();
        return $pagination ? $query->paginate() : $query->get();
    }

	public function promoCodeNew()
    {
        return new PromoCode();
    }

	public function promoCodeStore($data)
    {
        return PromoCode::create($data);
    }

	public function promoCodeFind($id)
    {
        return PromoCode::find($id);
    }

	public function promoCodeUpdate($data, $id)
    {
        return PromoCode::find($id)->update($data);
    }

	public function promoCodeDelete($id)
    {
        return PromoCode::find($id)->delete();
    }

    public function apply($guard, $code)
    {
        $date = strtotime(now());
        $customer = Auth::guard($guard)->user();
        $promoCode = PromoCode::whereCode($code)->whereStatus('Active')->where('valid_from','<=', $date)->where('valid_until', '>=', $date)->first();
        if($promoCode){
            $cartAmount = 0;
            foreach($customer->carts as $item){
                $cartAmount += $item->product->price * $item->quantity; 
            }
            $checkCoupon = $customer->coupons()->wherePromoCodeId($promoCode->id)->first();
            if($promoCode->discount_type == 'Fixed Amount' && $promoCode->discount_value > $cartAmount){
                $responce = ['status' => false, 'message' => 'Add more items to apply this coupon!'];
            }elseif($checkCoupon && $checkCoupon->status == 'Active'){
                $responce = ['status' => false, 'message' => 'Coupon code is already applied!'];    
            }elseif($checkCoupon && $checkCoupon->status == 'Used'){
                $countUsage = $customer->coupons()->wherePromoCodeId($promoCode->id)->count();
                if($countUsage >= $promoCode->usage_limit){
                    $responce = ['status' => false, 'message' => 'Coupon code usage limit is already used!'];        
                }else{
                    $customer->coupons()->create(['promo_code_id' => $promoCode->id]);
                    $responce = ['status' => true, 'message' => 'Coupon code applied successfully!'];
                }
            }
        }else{
            $responce = ['status' => false, 'message' => 'Invalid coupon code!'];
        }
        return $responce;
    }

    public function discount($guard)
    {
        $discount = 0;
        $cartAmount = 0;
        $customer = Auth::guard($guard)->user();
        foreach($customer->carts as $item){
            $cartAmount += $item->product->price * $item->quantity; 
        }
        $ids = $customer->coupons()->whereStatus('Active')->pluck('promo_code_id');
        $promoCodes = PromoCode::whereIn('id', $ids)->whereStatus('Active')->where('valid_from','<=', strtotime(now()))->where('valid_until', '>=', strtotime(now()))->get();
        foreach($promoCodes as $row){
            if($row->discount_type == 'Fixed Amount'){
                $discount += $row->discount_value;
            }else{
                $discount = (($cartAmount - $discount) * $row->discount_value) / 100;
            }
        }
        return ['discount' => $discout];
    }
}
