<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\SecurityGuard;
use Illuminate\Http\Request;

/**
 * Class SecurityGuardController
 * @package App\Http\Controllers
 */
class SecurityGuardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:securityGuards-list',  ['only' => ['index']]);
        $this->middleware('permission:securityGuards-view',  ['only' => ['show']]);
        $this->middleware('permission:securityGuards-create',['only' => ['create','store']]);
        $this->middleware('permission:securityGuards-edit',  ['only' => ['edit','update']]);
        $this->middleware('permission:securityGuards-delete',['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $securityGuards = SecurityGuard::get();

        return view('admin.security-guard.index', compact('securityGuards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $securityGuard = new SecurityGuard();
        return view('admin.security-guard.create', compact('securityGuard'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $securityGuard = SecurityGuard::create($request->all());
        return redirect()->route('security-guards.index')
            ->with('success', 'SecurityGuard created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $securityGuard = SecurityGuard::find($id);

        return view('admin.security-guard.show', compact('securityGuard'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $securityGuard = SecurityGuard::find($id);

        return view('admin.security-guard.edit', compact('securityGuard'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  SecurityGuard $securityGuard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SecurityGuard $securityGuard)
    {
        $securityGuard->update($request->all());

        return redirect()->route('security-guards.index')
            ->with('success', 'SecurityGuard updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $securityGuard = SecurityGuard::find($id)->delete();

        return redirect()->route('security-guards.index')
            ->with('success', 'SecurityGuard deleted successfully');
    }
}
