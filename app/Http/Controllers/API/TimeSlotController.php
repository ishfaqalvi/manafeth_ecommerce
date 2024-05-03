<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\API\BaseController;

use Illuminate\Http\Request;
use App\Contracts\TimeSlotInterface;

/**
 * Class TimeSlotController
 * @package App\Http\Controllers
 */
class TimeSlotController extends BaseController
{
    protected $timeSlot;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct(TimeSlotInterface $timeSlot)
    {
        $this->timeSlot = $timeSlot;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $data = $this->timeSlot->available($request->type, $request->date);
            return $this->sendResponse($data, 'Time slots list get successfully.');
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }
}
