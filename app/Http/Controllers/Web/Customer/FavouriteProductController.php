<?php

namespace App\Http\Controllers\Web\Customer;

use Illuminate\Http\Request;
use App\Contracts\ProductInterface;
use App\Http\Controllers\Controller;

/**
 * Class FavouriteProductController
 * @package App\Http\Controllers
 */
class FavouriteProductController extends Controller
{
    protected $product;

    public function __construct(ProductInterface $product){
        $this->product = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $favouriteProducts = $this->product->favouriteList('customer');
        return view('web.customer.favourite.index', compact('favouriteProducts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $responce = $this->product->favouriteStore($request->all());
        return response()->json(['success' => $responce]);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Request $request)
    {
        $this->product->favouriteRemove($request->id);
        return response()->json(['success' => true]);
    }
}
