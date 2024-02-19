<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\API\BaseController as BaseController;

use Illuminate\Http\Request;
use App\Models\ApiToken;

class MobileApiController extends BaseController
{
    /**
     * Get list of a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function apiTokenList()
    {
        $tokens = ApiToken::whereIn('id',getApiTokenIds())->get();
        return $this->sendResponse($tokens, 'Token data get successfully.');
    }
}
