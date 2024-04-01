<?php

namespace App\Http\Controllers\Web;
use Illuminate\Http\Request;

use App\Contracts\BlogInterface;
use App\Http\Controllers\Controller;

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
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = $this->blog->simpleList();

        return view('web.blog.index', compact('blogs'));
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

        return view('web.blog.show', compact('blog'));
    }
}
