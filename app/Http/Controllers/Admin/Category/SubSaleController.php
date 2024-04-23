<?php

namespace App\Http\Controllers\Admin\Category;

use Illuminate\Http\Request;
use App\Contracts\CategoryInterface;
use App\Http\Controllers\Controller;

class SubSaleController extends Controller
{
    protected $category;

    public function __construct(CategoryInterface $category){
        $this->category = $category;

        $this->middleware('permission:saleSubCategories-list',  ['only' => ['index']]);
        $this->middleware('permission:saleSubCategories-view',  ['only' => ['show']]);
        $this->middleware('permission:saleSubCategories-create',['only' => ['create','store']]);
        $this->middleware('permission:saleSubCategories-edit',  ['only' => ['edit','update']]);
        $this->middleware('permission:saleSubCategories-delete',['only' => ['destroy']]);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = $this->category->subList('Sale','pagination');

        return view('admin.category.sub.sale.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = $this->category->subNew();

        return view('admin.category.sub.sale.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->category->subStore($request->all());

        return redirect()->route('sub.sale.index')->with('success', 'Sale Sub Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = $this->category->subFind($id);

        return view('admin.category.sub.sale.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = $this->category->subFind($id);

        return view('admin.category.sub.sale.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->category->subUpdate($request->all(), $id);

        return redirect()->route('sub.sale.index')->with('success', 'Sale Sub Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->category->subDelete($id);

        return redirect()->route('sub.sale.index')->with('success', 'Sale Sub Category deleted successfully.');
    }
}
