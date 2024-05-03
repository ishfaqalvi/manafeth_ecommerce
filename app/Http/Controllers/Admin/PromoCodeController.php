<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\CouponInterface;
use App\Http\Controllers\Controller;

/**
 * Class PromoCodeController
 * @package App\Http\Controllers
 */
class PromoCodeController extends Controller
{
    protected $coupon;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct(CouponInterface $coupon)
    {
        $this->coupon = $coupon;
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
        $promoCodes = $this->coupon->promoCodeList('pagination');

        return view('admin.promo-code.index', compact('promoCodes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $promoCode = $this->coupon->promoCodeNew();
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
        $promoCode = $this->coupon->promoCodeStore($request->all());
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
        $promoCode = $this->coupon->promoCodeFind($id);

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
        $promoCode = $this->coupon->promoCodeFind($id);

        return view('admin.promo-code.edit', compact('promoCode'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  PromoCode $promoCode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->coupon->promoCodeUpdate($request->all(), $id);

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
        $this->coupon->promoCodeDelete($id);

        return redirect()->route('promo-codes.index')
            ->with('success', 'PromoCode deleted successfully');
    }
}
