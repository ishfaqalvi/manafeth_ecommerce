<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\TopSearch;
use Illuminate\Http\Request;

/**
 * Class TopSearchController
 * @package App\Http\Controllers
 */
class TopSearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:topSearches-list',  ['only' => ['index']]);
        $this->middleware('permission:topSearches-view',  ['only' => ['show']]);
        $this->middleware('permission:topSearches-create',['only' => ['create','store']]);
        $this->middleware('permission:topSearches-edit',  ['only' => ['edit','update']]);
        $this->middleware('permission:topSearches-delete',['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topSearches = TopSearch::get();

        return view('admin.top-search.index', compact('topSearches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $topSearch = new TopSearch();
        return view('admin.top-search.create', compact('topSearch'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $topSearch = TopSearch::create($request->all());
        return redirect()->route('top-searches.index')
            ->with('success', 'TopSearch created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $topSearch = TopSearch::find($id);

        return view('admin.top-search.show', compact('topSearch'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $topSearch = TopSearch::find($id);

        return view('admin.top-search.edit', compact('topSearch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  TopSearch $topSearch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TopSearch $topSearch)
    {
        $topSearch->update($request->all());

        return redirect()->route('top-searches.index')
            ->with('success', 'TopSearch updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $topSearch = TopSearch::find($id)->delete();

        return redirect()->route('top-searches.index')
            ->with('success', 'TopSearch deleted successfully');
    }
}
