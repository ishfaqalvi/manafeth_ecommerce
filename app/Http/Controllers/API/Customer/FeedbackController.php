<?php

namespace App\Http\Controllers\API\Customer;
use App\Http\Controllers\API\BaseController;

use App\Models\Feedback;
use Illuminate\Http\Request;

/**
 * Class FeedbackController
 * @package App\Http\Controllers
 */
class FeedbackController extends BaseController
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            Feedback::create($request->all());
            return $this->sendResponse('', 'Feedback received successfully.');
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }
}
