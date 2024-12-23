<?php

use App\Models\Product;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\{User,Brand,Category,SubCategory};

/**
 * Get listing of a resource.
 */
function brands()
{
    return Brand::pluck('name','id');
}

/**
 * Get listing of a resource.
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
 */
function subCategories($type = null, $pluck = false)
{
    $query = SubCategory::query();

    if (!is_null($type)) {
        $query->where('type', $type);
    }
    return $pluck ? $query->pluck('name','id') : $query->get();
}

/**
 * Get listing of a resource.
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
 */
function drivers($pluck = false)
{
    if($pluck){
        $users = Employee::where('roles', 'LIKE', '%Driver%')->get()->mapWithKeys(function ($user) {
            $string = "{$user->name} ({$user->mobile_number} )";
            return [$user->id => $string];
        })->toArray();
    }else{
        $users = Employee::where('roles', 'LIKE', '%Driver%')->get();
    }
    return $users;
}

/**
 * Get listing of a resource.
 */
function warehouseBoys($pluck = false)
{
    if($pluck){
        $users = Employee::where('roles', 'LIKE', '%Warehouse Boy%')->get()->mapWithKeys(function ($user) {
            $string = "{$user->name} ({$user->mobile_number} )";
            return [$user->id => $string];
        })->toArray();
    }else{
        $users = Employee::where('roles', 'LIKE', '%Warehouse Boy%')->get();
    }
    return $users;
}

/**
 * Get listing of a resource.
 */
function maintenenceBoys($pluck = false)
{
    if($pluck){
        $users = Employee::where('roles', 'LIKE', '%Maintenence Boy%')->get()->mapWithKeys(function ($user) {
            $string = "{$user->name} ({$user->mobile_number} )";
            return [$user->id => $string];
        })->toArray();
    }else{
        $users = Employee::where('roles', '%Maintenence Boy%')->get();
    }
    return $users;
}

/**
 * Get listing of a resource.
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
