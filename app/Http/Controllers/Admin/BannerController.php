<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Contracts\BannerInterface;
use Illuminate\Http\Request;

/**
 * Class BannerController
 * @package App\Http\Controllers
 */
class BannerController extends Controller
{
    protected $banner;
    
    public function __construct(BannerInterface $banner){
        $this->banner = $banner;

        $this->middleware('permission:banners-list',  ['only' => ['index']]);
        $this->middleware('permission:banners-view',  ['only' => ['show']]);
        $this->middleware('permission:banners-create',['only' => ['create','store']]);
        $this->middleware('permission:banners-edit',  ['only' => ['edit','update']]);
        $this->middleware('permission:banners-delete',['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = $this->banner->groupByList();

        return view('admin.banner.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $banner = $this->banner->create();
        return view('admin.banner.create', compact('banner'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $banner = $this->banner->store($request->all());
        return redirect()->route('banners.index')->with('success', 'Banner created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $banner = $this->banner->find($id);

        return view('admin.banner.show', compact('banner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner = $this->banner->find($id);

        return view('admin.banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Banner $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $banner)
    {
        $banner->update($request->all(), $banner);

        return redirect()->route('banners.index')->with('success', 'Banner updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $banner = $this->banner->delete($id);

        return redirect()->route('banners.index')->with('success', 'Banner deleted successfully');
    }
}