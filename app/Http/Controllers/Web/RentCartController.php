<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\RentCart;
use Illuminate\Http\Request;

/**
 * Class RentCartController
 * @package App\Http\Controllers
 */
class RentCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:rentCarts-list',  ['only' => ['index']]);
        $this->middleware('permission:rentCarts-view',  ['only' => ['show']]);
        $this->middleware('permission:rentCarts-create',['only' => ['create','store']]);
        $this->middleware('permission:rentCarts-edit',  ['only' => ['edit','update']]);
        $this->middleware('permission:rentCarts-delete',['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rentCarts = RentCart::get();

        return view('admin.rent-cart.index', compact('rentCarts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rentCart = new RentCart();
        return view('admin.rent-cart.create', compact('rentCart'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $rentCart = RentCart::create($request->all());
        return redirect()->route('rent-carts.index')
            ->with('success', 'RentCart created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rentCart = RentCart::find($id);

        return view('admin.rent-cart.show', compact('rentCart'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rentCart = RentCart::find($id);

        return view('admin.rent-cart.edit', compact('rentCart'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  RentCart $rentCart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RentCart $rentCart)
    {
        $rentCart->update($request->all());

        return redirect()->route('rent-carts.index')
            ->with('success', 'RentCart updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $rentCart = RentCart::find($id)->delete();

        return redirect()->route('rent-carts.index')
            ->with('success', 'RentCart deleted successfully');
    }
}
