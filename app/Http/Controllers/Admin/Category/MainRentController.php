<?php

namespace App\Http\Controllers\Admin\Category;

use Illuminate\Http\Request;
use App\Contracts\CategoryInterface;
use App\Http\Controllers\Controller;

class MainRentController extends Controller
{
    protected $category;

    public function __construct(CategoryInterface $category){
        $this->category = $category;

        $this->middleware('permission:rentCategories-list',  ['only' => ['index']]);
        $this->middleware('permission:rentCategories-view',  ['only' => ['show']]);
        $this->middleware('permission:rentCategories-create',['only' => ['create','store']]);
        $this->middleware('permission:rentCategories-edit',  ['only' => ['edit','update']]);
        $this->middleware('permission:rentCategories-delete',['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = $this->category->mainList('Rent','pagination');

        return view('admin.category.main.rent.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = $this->category->mainNew();

        return view('admin.category.main.rent.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->category->mainStore($request->all());

        return redirect()->route('main.rent.index')->with('success', 'Rent Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = $this->category->mainFind($id);

        return view('admin.category.main.rent.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = $this->category->mainFind($id);

        return view('admin.category.main.rent.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->category->mainUpdate($request->all(), $id);

        return redirect()->route('main.rent.index')->with('success', 'Rent Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->category->mainDelete($id);

        return redirect()->route('main.rent.index')->with('success', 'Rent Category deleted successfully.');
    }
}
