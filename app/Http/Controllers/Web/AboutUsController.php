<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('web.about_us.index');
    }
}
