<?php

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
function categories()
{
    return Category::pluck('name','id');
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