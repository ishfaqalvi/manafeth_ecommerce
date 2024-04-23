<?php

namespace App\Http\Controllers\Admin\Category;

use Illuminate\Http\Request;
use App\Contracts\CategoryInterface;
use App\Http\Controllers\Controller;

class MainSaleController extends Controller
{
    protected $category;

    public function __construct(CategoryInterface $category){
        $this->category = $category;

        $this->middleware('permission:saleCategories-list',  ['only' => ['index']]);
        $this->middleware('permission:saleCategories-view',  ['only' => ['show']]);
        $this->middleware('permission:saleCategories-create',['only' => ['create','store']]);
        $this->middleware('permission:saleCategories-edit',  ['only' => ['edit','update']]);
        $this->middleware('permission:saleCategories-delete',['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = $this->category->mainList('Sale','pagination');

        return view('admin.category.main.sale.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = $this->category->mainNew();

        return view('admin.category.main.sale.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->category->mainStore($request->all());

        return redirect()->route('main.sale.index')->with('success', 'Sale Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = $this->category->mainFind($id);

        return view('admin.category.main.sale.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = $this->category->mainFind($id);

        return view('admin.category.main.sale.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->category->mainUpdate($request->all(), $id);

        return redirect()->route('main.sale.index')->with('success', 'Sale Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->category->mainDelete($id);

        return redirect()->route('main.sale.index')->with('success', 'Sale Category deleted successfully.');
    }
}
