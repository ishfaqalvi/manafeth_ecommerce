<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\RentRequest;
use Illuminate\Http\Request;

/**
 * Class RentRequestController
 * @package App\Http\Controllers
 */
class RentRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:rentRequests-list',  ['only' => ['index']]);
        $this->middleware('permission:rentRequests-view',  ['only' => ['show']]);
        $this->middleware('permission:rentRequests-create',['only' => ['create','store']]);
        $this->middleware('permission:rentRequests-edit',  ['only' => ['edit','update']]);
        $this->middleware('permission:rentRequests-delete',['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rentRequests = RentRequest::get();

        return view('admin.rent-request.index', compact('rentRequests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rentRequest = new RentRequest();
        return view('admin.rent-request.create', compact('rentRequest'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $rentRequest = RentRequest::create($request->all());
        return redirect()->route('rent-requests.index')
            ->with('success', 'RentRequest created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rentRequest = RentRequest::find($id);

        return view('admin.rent-request.show', compact('rentRequest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rentRequest = RentRequest::find($id);

        return view('admin.rent-request.edit', compact('rentRequest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  RentRequest $rentRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RentRequest $rentRequest)
    {
        $rentRequest->update($request->all());

        return redirect()->route('rent-requests.index')
            ->with('success', 'RentRequest updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $rentRequest = RentRequest::find($id)->delete();

        return redirect()->route('rent-requests.index')
            ->with('success', 'RentRequest deleted successfully');
    }
}
