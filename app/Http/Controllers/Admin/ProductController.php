<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\{Product,Category,ProductFeature,ProductSpecification,ProductResource};
use Illuminate\Http\Request;

/**
 * Class ProductController
 * @package App\Http\Controllers
 */
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:products-list',  ['only' => ['index']]);
        $this->middleware('permission:products-view',  ['only' => ['show']]);
        $this->middleware('permission:products-create',['only' => ['create','store']]);
        $this->middleware('permission:products-edit',  ['only' => ['edit','update']]);
        $this->middleware('permission:products-delete',['only' => ['destroy']]);

        $this->middleware('permission:products-imageList',    ['only' => ['images']]);
        $this->middleware('permission:products-imageCreate',  ['only' => ['imageStore']]);
        $this->middleware('permission:products-imageDelete',  ['only' => ['imageDestroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::filter($request->all())->paginate();
        $request->method() == 'POST' ? $userRequest = $request : $userRequest = null;

        return view('admin.product.index', compact('products','userRequest'))
        ->with('i', (request()->input('page', 1) - 1) * $products->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new Product();
        return view('admin.product.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $product = Product::create($request->all());
        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        return view('admin.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $product = Product::find($id)->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function featureStore(Request $request)
    {
        ProductFeature::create($request->all());
        return redirect()->back()->with('success', 'Feature added successfully!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function featureUpdate(Request $request)
    {
        $feature = ProductFeature::find($request->id);
        $feature->update($request->all());

        return redirect()->back()->with('success', 'Feature updated successfully!');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function featureDestroy($id)
    {
        $product = ProductFeature::find($id)->delete();

         return redirect()->back()->with('success', 'Feature deleted successfully!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function specificationStore(Request $request)
    {
        ProductSpecification::create($request->all());
        return redirect()->back()->with('success', 'Specification added successfully!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function specificationUpdate(Request $request)
    {
        $specification = ProductSpecification::find($request->id);
        $specification->update($request->all());

        return redirect()->back()->with('success', 'Specification updated successfully!');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function specificationDestroy($id)
    {
        ProductSpecification::find($id)->delete();

        return redirect()->back()->with('success', 'Specification deleted successfully!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function resourceStore(Request $request)
    {
        $input = $request->all();
        $file = $request->file;
        $name = $file->getClientOriginalName();
        $file->move('images/product/resource', $name);
        $input['file'] = 'images/product/resource/'.$name;

        ProductResource::create($input);
        return redirect()->back()->with('success', 'Resource added successfully!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function resourceUpdate(Request $request)
    {
        $resource = ProductResource::find($request->id);
        $resource->update($request->all());

        return redirect()->back()->with('success', 'Resource updated successfully!');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function resourceDestroy($id)
    {
        ProductResource::find($id)->delete();

        return redirect()->back()->with('success', 'Resource deleted successfully!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function imageStore(Request $request)
    {
        $product = Product::find($request->product_id);
        $product->images()->create($request->all());
        return redirect()->back()->with('success', 'Product Image created successfully.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function imageDestroy($id)
    {
        ProductImage::find($id)->delete();

        return redirect()->back()->with('success', 'Product Image deleted successfully.');
    }

    /**
     * get a listing of the resource
     *
     * @return void
     */
    public function subCategories(Request $request)
    {
        $category = Category::find($request->id);
        echo json_encode($category->subCategories);
    }
}
