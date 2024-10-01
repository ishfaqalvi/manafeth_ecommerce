<?php

namespace App\Http\Controllers\Admin\Rent;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\{RentLink,ProductRent};
use App\Contracts\{RentInterface,ProductInterface,TimeSlotInterface};

/**
 * Class RentLinkController
 * @package App\Http\Controllers
 */
class RentLinkController extends Controller
{
    protected $rentLink, $products, $slot;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct(RentInterface $rentLink, ProductInterface $products, TimeSlotInterface $slot)
    {
        $this->slot = $slot;
        $this->rentLink = $rentLink;
        $this->products = $products;
        $this->middleware('permission:rentLinks-list',  ['only' => ['index']]);
        $this->middleware('permission:rentLinks-view',  ['only' => ['show']]);
        $this->middleware('permission:rentLinks-create',['only' => ['create','store']]);
        $this->middleware('permission:rentLinks-edit',  ['only' => ['edit','update']]);
        $this->middleware('permission:rentLinks-delete',['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rentLinks = $this->rentLink->linkList('User', true);

        return view('admin.rent.link.index', compact('rentLinks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rentLink = $this->rentLink->linkCreate();
        $products = $this->products->rentProductList(null, false);

        $products = $products->pluck('name','id');

        return view('admin.rent.link.create', compact('rentLink', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        $rentLink = $this->rentLink->linkStore($request->all(), $user);
        return redirect()->route('links.index')->with('success', 'Rent Link created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rentLink = $this->rentLink->linkFind($id);

        return view('admin.rent.link.show', compact('rentLink'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rentLink = $this->rentLink->linkFind($id);
        $products = $this->products->rentProductList(null, false);

        $products = $products->pluck('name','id');

        return view('admin.rent.link.edit', compact('rentLink','products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  RentLink $rentLink
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RentLink $link)
    {
        $this->rentLink->linkUpdate($request->all(), $link);

        return redirect()->route('links.index')->with('success', 'Rent Link updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $this->rentLink->linkDelete($id);

        return redirect()->route('links.index')->with('success', 'Rent Link deleted successfully');
    }

    /**
     * Display a listing of the resource.
     */
    public function getRents(Request $request)
    {
        $rents = ProductRent::whereProductId($request->product_id)->get();

        echo json_encode($rents);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function timeSlots(Request $request)
    {
        $slots = $this->slot->available($request->type, $request->date);

        echo json_encode($slots);
    }
}
