<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\API\BaseController;

use App\Models\TopSearch;
use Illuminate\Http\Request;

/**
 * Class TopSearchController
 * @package App\Http\Controllers
 */
class TopSearchController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $topSearches = TopSearch::orderBy('created_at', 'desc')
            ->take(10)
            ->get();
            return $this->sendResponse($topSearches, 'Top 10 searches list get successfully.');
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $topSearch = TopSearch::create($request->all());
            return $this->sendResponse($topSearch, 'TopSearch created successfully.');
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }
}
