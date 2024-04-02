<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Contracts\BlogInterface;

/**
 * Class BlogController
 * @package App\Http\Controllers
 */
class BlogController extends Controller
{
    protected $blog;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(BlogInterface $blog){
        $this->blog = $blog;
        $this->middleware('permission:blogs-list',  ['only' => ['index']]);
        $this->middleware('permission:blogs-view',  ['only' => ['show']]);
        $this->middleware('permission:blogs-create',['only' => ['create','store']]);
        $this->middleware('permission:blogs-edit',  ['only' => ['edit','update']]);
        $this->middleware('permission:blogs-delete',['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = $this->blog->paginationList();

        return view('admin.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blog = $this->blog->create();

        return view('admin.blog.create', compact('blog'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $blog = $this->blog->store($request->all());
        return redirect()->route('blogs.index')
            ->with('success', 'Blog created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = $this->blog->find($id);

        return view('admin.blog.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = $this->blog->find($id);

        return view('admin.blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Blog $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $blog)
    {
        $this->blog->update($request->all(), $blog);

        return redirect()->route('blogs.index')
            ->with('success', 'Blog updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $this->blog->delete($id);

        return redirect()->route('blogs.index')
            ->with('success', 'Blog deleted successfully');
    }
}
