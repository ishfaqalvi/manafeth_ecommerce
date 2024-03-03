<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\MaintenenceRequest;
use Illuminate\Http\Request;

/**
 * Class MaintenenceRequestController
 * @package App\Http\Controllers
 */
class MaintenenceRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:maintenenceRequests-list',  ['only' => ['index']]);
        $this->middleware('permission:maintenenceRequests-view',  ['only' => ['show']]);
        $this->middleware('permission:maintenenceRequests-create',['only' => ['create','store']]);
        $this->middleware('permission:maintenenceRequests-edit',  ['only' => ['edit','update']]);
        $this->middleware('permission:maintenenceRequests-delete',['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maintenenceRequests = MaintenenceRequest::get();

        return view('admin.maintenence-request.index', compact('maintenenceRequests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $maintenenceRequest = new MaintenenceRequest();
        return view('admin.maintenence-request.create', compact('maintenenceRequest'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $maintenenceRequest = MaintenenceRequest::create($request->all());
        return redirect()->route('maintenence-requests.index')
            ->with('success', 'MaintenenceRequest created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $maintenenceRequest = MaintenenceRequest::find($id);

        return view('admin.maintenence-request.show', compact('maintenenceRequest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $maintenenceRequest = MaintenenceRequest::find($id);

        return view('admin.maintenence-request.edit', compact('maintenenceRequest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  MaintenenceRequest $maintenenceRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MaintenenceRequest $maintenenceRequest)
    {
        $maintenenceRequest->update($request->all());

        return redirect()->route('maintenence-requests.index')
            ->with('success', 'MaintenenceRequest updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $maintenenceRequest = MaintenenceRequest::find($id)->delete();

        return redirect()->route('maintenence-requests.index')
            ->with('success', 'MaintenenceRequest deleted successfully');
    }
}
