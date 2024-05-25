<?php

use App\Models\Product;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\{User,Brand,Category};

/**
 * Get listing of a resource.
 *
 * @return \Illuminate\Http\Response
 */
function brands()
{
    return Brand::pluck('name','id');
}

/**
 * Get listing of a resource.
 *
 * @return \Illuminate\Http\Response
 */
function categories($type = null)
{
    $query = Category::query();

    if (!is_null($type)) {
        $query->where('type', $type);
    }
    return $query->pluck('name','id');
}

/**
 * Get listing of a resource.
 *
 * @return \Illuminate\Http\Response
 */
function users()
{
    $users = User::all()->mapWithKeys(function ($user) {
        $string = "{$user->name} ({$user->phone_number} )";
        return [$user->id => $string];
    })->toArray();
    return $users;
}

/**
 * Get listing of a resource.
 *
 * @return \Illuminate\Http\Response
 */
function customers()
{
    $users = Customer::all()->mapWithKeys(function ($user) {
        $string = "{$user->name} ({$user->mobile_number} )";
        return [$user->id => $string];
    })->toArray();
    return $users;
}

/**
 * Get listing of a resource.
 *
 * @return \Illuminate\Http\Response
 */
function drivers()
{
    $users = Employee::where('roles', 'LIKE', '%Driver%')->get()->mapWithKeys(function ($user) {
        $string = "{$user->name} ({$user->mobile_number} )";
        return [$user->id => $string];
    })->toArray();
    return $users;
}

/**
 * Get listing of a resource.
 *
 * @return \Illuminate\Http\Response
 */
function warehouseBosys()
{
    $users = Employee::where('roles', 'LIKE', '%Warehouse Boy%')->get()->mapWithKeys(function ($user) {
        $string = "{$user->name} ({$user->mobile_number} )";
        return [$user->id => $string];
    })->toArray();
    return $users;
}

/**
 * Get listing of a resource.
 *
 * @return \Illuminate\Http\Response
 */
function maintenenceBosys()
{
    $users = Employee::where('roles', 'LIKE', '%Maintenence Boy%')->get()->mapWithKeys(function ($user) {
        $string = "{$user->name} ({$user->mobile_number} )";
        return [$user->id => $string];
    })->toArray();
    return $users;
}

/**
 * Get listing of a resource.
 *
 * @return \Illuminate\Http\Response
 */
function topics()
{
    $topic = array();
    foreach(explode(',',settings('firebase_topic')) as $topic)
    {
        $tpics[$topic] = $topic;
    }
    return $tpics;
}

/**
 * Get listing of a resource.
 *
 * @return \Illuminate\Http\Response
 */
function productResourceTypes($productId)
{
    $product = Product::find($productId);
    $resourceArray = [
        'Basic Operation Documents' => 'Basic Operation Documents',
        'Brochures' => 'Brochures',
        'Spec Sheets' => 'Spec Sheets',
        'Order Forms' => 'Order Forms',
        'Owner Manuals' => 'Owner Manuals',
        'Warranty Inserts' => 'Warranty Inserts',
        'Quantum Videos' => 'Quantum Videos',
        'IBPs(UK)' => 'IBPs(UK)'
    ];

    $usedResource = $product->resources()->pluck('type')->toArray();

    $usedResources = array_filter($resourceArray, function ($key) use ($usedResource) {
        return !in_array($key, $usedResource);
    }, ARRAY_FILTER_USE_KEY);

    return $usedResources;
}
