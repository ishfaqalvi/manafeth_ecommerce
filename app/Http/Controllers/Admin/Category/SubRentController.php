<?php

namespace App\Http\Controllers\Admin\Category;

use Illuminate\Http\Request;
use App\Contracts\CategoryInterface;
use App\Http\Controllers\Controller;

class SubRentController extends Controller
{
    protected $category;

    public function __construct(CategoryInterface $category){
        $this->category = $category;

        $this->middleware('permission:rentSubCategories-list',  ['only' => ['index']]);
        $this->middleware('permission:rentSubCategories-view',  ['only' => ['show']]);
        $this->middleware('permission:rentSubCategories-create',['only' => ['create','store']]);
        $this->middleware('permission:rentSubCategories-edit',  ['only' => ['edit','update']]);
        $this->middleware('permission:rentSubCategories-delete',['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = $this->category->subList('Rent','pagination');

        return view('admin.category.sub.rent.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = $this->category->subNew();

        return view('admin.category.sub.rent.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->category->subStore($request->all());

        return redirect()->route('sub.rent.index')->with('success', 'Rent Sub Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = $this->category->subFind($id);

        return view('admin.category.sub.rent.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = $this->category->subFind($id);

        return view('admin.category.sub.rent.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->category->subUpdate($request->all(), $id);

        return redirect()->route('sub.rent.index')->with('success', 'Rent Sub Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->category->subDelete($id);

        return redirect()->route('sub.rent.index')->with('success', 'Rent Sub Category deleted successfully.');
    }
}
