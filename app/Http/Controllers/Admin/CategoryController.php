<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\{Category,SubCategory};
use Illuminate\Http\Request;

/**
 * Class CategoryController
 * @package App\Http\Controllers
 */
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:categories-list',     ['only' => ['index']]);
        $this->middleware('permission:categories-view',     ['only' => ['show']]);
        $this->middleware('permission:categories-create',   ['only' => ['create','store']]);
        $this->middleware('permission:categories-edit',     ['only' => ['edit','update']]);
        $this->middleware('permission:categories-delete',   ['only' => ['destroy']]);
        $this->middleware('permission:categories-subList',  ['only' => ['sub']]);
        $this->middleware('permission:categories-subCreate',['only' => ['subStore']]);
        $this->middleware('permission:categories-subEdit',  ['only' => ['subUpdate']]);
        $this->middleware('permission:categories-subDelete',['only' => ['subDestroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::paginate();
        
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = new Category();

        return view('admin.category.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = Category::create($request->all());
        return redirect()->route('categories.all.index')
            ->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);

        return view('admin.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);

        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->update($request->all());

        return redirect()->route('categories.all.index')
            ->with('success', 'Category updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $category = Category::find($id)->delete();

        return redirect()->route('categories.all.index')
            ->with('success', 'Category deleted successfully');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sub(Request $request)
    {
        $subCategories = SubCategory::paginate();
        
        return view('admin.category.sub.index', compact('subCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function subStore(Request $request)
    {
       $category = SubCategory::create($request->all());
        return redirect()->back()->with('success', 'Sub Category created successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function subUpdate(Request $request)
    {
        $category = SubCategory::find($request->id);

        $category->update($request->all());

        return redirect()->back()->with('success', 'Sub Category updated successfully.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function subDestroy($id)
    {
        $category = SubCategory::find($id)->delete();

        return redirect()->back()->with('success', 'Sub Category deleted successfully.');
    }
}
