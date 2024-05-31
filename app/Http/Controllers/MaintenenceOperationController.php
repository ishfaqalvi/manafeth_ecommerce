<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\MaintenenceOperation;
use Illuminate\Http\Request;

/**
 * Class MaintenenceOperationController
 * @package App\Http\Controllers
 */
class MaintenenceOperationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:maintenenceOperations-list',  ['only' => ['index']]);
        $this->middleware('permission:maintenenceOperations-view',  ['only' => ['show']]);
        $this->middleware('permission:maintenenceOperations-create',['only' => ['create','store']]);
        $this->middleware('permission:maintenenceOperations-edit',  ['only' => ['edit','update']]);
        $this->middleware('permission:maintenenceOperations-delete',['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maintenenceOperations = MaintenenceOperation::get();

        return view('admin.maintenence-operation.index', compact('maintenenceOperations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $maintenenceOperation = new MaintenenceOperation();
        return view('admin.maintenence-operation.create', compact('maintenenceOperation'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $maintenenceOperation = MaintenenceOperation::create($request->all());
        return redirect()->route('maintenence-operations.index')
            ->with('success', 'MaintenenceOperation created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $maintenenceOperation = MaintenenceOperation::find($id);

        return view('admin.maintenence-operation.show', compact('maintenenceOperation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $maintenenceOperation = MaintenenceOperation::find($id);

        return view('admin.maintenence-operation.edit', compact('maintenenceOperation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  MaintenenceOperation $maintenenceOperation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MaintenenceOperation $maintenenceOperation)
    {
        $maintenenceOperation->update($request->all());

        return redirect()->route('maintenence-operations.index')
            ->with('success', 'MaintenenceOperation updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $maintenenceOperation = MaintenenceOperation::find($id)->delete();

        return redirect()->route('maintenence-operations.index')
            ->with('success', 'MaintenenceOperation deleted successfully');
    }
}
