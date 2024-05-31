<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;

use App\Models\MaintenenceRequest;
use App\Http\Controllers\Controller;
use App\Contracts\{ProductInterface, MaintenenceInterface};

/**
 * Class MaintenenceRequestController
 * @package App\Http\Controllers
 */
class MaintenenceRequestController extends Controller
{
    protected $maintenence;
    protected $product;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct(MaintenenceInterface $maintenence, ProductInterface $product)
    {
        $this->maintenence = $maintenence;
        $this->product = $product;
        $this->middleware('permission:maintenenceRequests-list',  ['only' => ['index']]);
        $this->middleware('permission:maintenenceRequests-view',  ['only' => ['show']]);
        $this->middleware('permission:maintenenceRequests-create',['only' => ['create','store']]);
        $this->middleware('permission:maintenenceRequests-edit',  ['only' => ['edit','update']]);
        $this->middleware('permission:maintenenceRequests-delete',['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maintenenceRequests = $this->maintenence->list(null, true);

        return view('admin.maintenence-request.index', compact('maintenenceRequests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $maintenenceRequest = $this->maintenence->create();
        return view('admin.maintenence-request.create', compact('maintenenceRequest'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->maintenence->store('Admin', $request->all());
        return redirect()->route('maintenance.index')
            ->with('success', 'MaintenenceRequest created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $maintenenceRequest = $this->maintenence->find($id);

        return view('admin.maintenence-request.show', compact('maintenenceRequest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  MaintenenceRequest $maintenenceRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->maintenence->update($request->all(), $request->id, 'Admin');

        return redirect()->route('maintenance.index')
            ->with('success', 'Maintenence Request updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        if($this->maintenence->find($id)->status == 'Rejected'){
            $this->maintenence->delete($id);
            return redirect()->back()->with('success', 'Maintenence Request deleted successfully');
        }
        return redirect()->back()->with('warning', 'Only rejected requests deleted');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function getProducts(Request $request)
    {
        $responce = $this->product->maintenanceCategoryWise($request->id);
        echo $responce;
    }
}
