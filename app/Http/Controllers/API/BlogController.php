<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;

use App\Contracts\BlogInterface;
use Illuminate\Http\Request;

/**
 * Class BlogController
 * @package App\Http\Controllers
 */
class BlogController extends BaseController
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
        try {
            $blogs = $this->blog->simpleList();
            return $this->sendResponse($blogs, 'Blogs list get successfully.');
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function special()
    {
        try {
            $blogs = $this->blog->specialList();
            return $this->sendResponse($blogs, 'Special Blogs list get successfully.');
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $blog = $this->blog->find($id);
            return $this->sendResponse($blog, 'Blog detail get successfully.');
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }
}
