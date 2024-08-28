<?php

namespace App\Http\Controllers\API\Customer;
use App\Http\Controllers\API\BaseController;

use Illuminate\Http\Request;
use App\Models\{RentLink,ProductRent};
use App\Contracts\{RentInterface,ProductInterface};

/**
 * Class RentLinkController
 * @package App\Http\Controllers
 */
class RentLinkController extends BaseController
{
    protected $rentLink, $products;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct(RentInterface $rentLink,ProductInterface $products)
    {
        $this->rentLink = $rentLink;
        $this->products = $products;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = $rentLinks = $this->rentLink->linkList('customerapi', false);
            return $this->sendResponse($data, 'Rent link list get successfully.');
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $customer = auth('customerapi')->user();
            $rentLink = $this->rentLink->linkStore($request->all(), $customer);
            return $this->sendResponse($rentLink, 'Rent Link created successfully.');
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $rentLink = $this->rentLink->linkFind($id);
            return $this->sendResponse($rentLink, 'Rent link detail get successfully.');
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
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
        try {
            $this->rentLink->linkUpdate($request->all(), $link);
            return $this->sendResponse('', 'Rent Link updated successfully.');
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        try {
            $this->rentLink->linkDelete($id);
            return $this->sendResponse('', 'Rent Link deleted successfully.');
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }
}
