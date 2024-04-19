<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\PromoCode;
use Illuminate\Http\Request;

/**
 * Class PromoCodeController
 * @package App\Http\Controllers
 */
class PromoCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:promoCodes-list',  ['only' => ['index']]);
        $this->middleware('permission:promoCodes-view',  ['only' => ['show']]);
        $this->middleware('permission:promoCodes-create',['only' => ['create','store']]);
        $this->middleware('permission:promoCodes-edit',  ['only' => ['edit','update']]);
        $this->middleware('permission:promoCodes-delete',['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promoCodes = PromoCode::get();

        return view('admin.promo-code.index', compact('promoCodes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $promoCode = new PromoCode();
        return view('admin.promo-code.create', compact('promoCode'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $promoCode = PromoCode::create($request->all());
        return redirect()->route('promo-codes.index')
            ->with('success', 'PromoCode created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $promoCode = PromoCode::find($id);

        return view('admin.promo-code.show', compact('promoCode'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $promoCode = PromoCode::find($id);

        return view('admin.promo-code.edit', compact('promoCode'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  PromoCode $promoCode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PromoCode $promoCode)
    {
        $promoCode->update($request->all());

        return redirect()->route('promo-codes.index')
            ->with('success', 'PromoCode updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $promoCode = PromoCode::find($id)->delete();

        return redirect()->route('promo-codes.index')
            ->with('success', 'PromoCode deleted successfully');
    }
}
