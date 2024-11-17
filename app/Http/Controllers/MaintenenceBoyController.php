<?php

namespace App\Http\Controllers;

use App\Models\MaintenenceBoy;
use App\Http\Requests\MaintenenceBoyRequest;

/**
 * Class MaintenenceBoyController
 * @package App\Http\Controllers
 */
class MaintenenceBoyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $maintenenceBoys = MaintenenceBoy::paginate();

        return view('maintenence-boy.index', compact('maintenenceBoys'))
            ->with('i', (request()->input('page', 1) - 1) * $maintenenceBoys->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $maintenenceBoy = new MaintenenceBoy();
        return view('maintenence-boy.create', compact('maintenenceBoy'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MaintenenceBoyRequest $request)
    {
        MaintenenceBoy::create($request->validated());

        return redirect()->route('maintenence-boys.index')
            ->with('success', 'MaintenenceBoy created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $maintenenceBoy = MaintenenceBoy::find($id);

        return view('maintenence-boy.show', compact('maintenenceBoy'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $maintenenceBoy = MaintenenceBoy::find($id);

        return view('maintenence-boy.edit', compact('maintenenceBoy'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MaintenenceBoyRequest $request, MaintenenceBoy $maintenenceBoy)
    {
        $maintenenceBoy->update($request->validated());

        return redirect()->route('maintenence-boys.index')
            ->with('success', 'MaintenenceBoy updated successfully');
    }

    public function destroy($id)
    {
        MaintenenceBoy::find($id)->delete();

        return redirect()->route('maintenence-boys.index')
            ->with('success', 'MaintenenceBoy deleted successfully');
    }
}
