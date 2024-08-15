<?php

use App\Models\Order;
use App\Models\Setting;
use Spatie\Image\Image;
use App\Models\Category;
use App\Models\RentRequest;
use Spatie\Image\Manipulations;
use App\Models\MaintenenceRequest;
use Illuminate\Support\Facades\Auth;

/**
 * Get listing of a resource.
 *
 * @return \Illuminate\Http\Response
 */
function uploadFile($file, $path, $width, $height)
{
    $extension = $file->getClientOriginalExtension();
    $name = uniqid().".".$extension;

    $folder = 'images/'.$path;
    $finalPath = $folder.'/'.$name;
    $file->move($folder, $name);

    Image::load($finalPath)->fit(Manipulations::FIT_CROP, $width, $height)->save(public_path($finalPath));
    return $finalPath;
}

/**
 * Get listing of a resource.
 *
 * @return \Illuminate\Http\Response
 */
function settings($key)
{
    return Setting::get($key);
}

/**
 * Get listing of a resource.
 *
 * @return \Illuminate\Http\Response
 */
function cartSummary()
{
    $subTotal = 0;
    foreach(Auth::guard('customer')->user()->carts()->get() as $item){
        $product = $item->product;
        $price = $product->price - $product->discount;
        $amount = $item->quantity * $price;
        $subTotal += $amount;
    }
    return $subTotal;
}

/**
 * Get listing of a resource.
 *
 * @return \Illuminate\Http\Response
 */
function ordersCount()
{
    $data = [
        'sale' => Order::whereStatus('Pending')->count(),
        'rent' => RentRequest::whereStatus('Pending')->count(),
        'maintenence' => MaintenenceRequest::whereStatus('Pending')->count(),
    ];
    return $data;
}

/**
 * Get listing of a resource.
 *
 * @return \Illuminate\Http\Response
 */
function categoriesList($type = null)
{
    $query = Category::query();

    if (!is_null($type)) {
        $query->where('type', $type);
    }
    return $query->get();
}
