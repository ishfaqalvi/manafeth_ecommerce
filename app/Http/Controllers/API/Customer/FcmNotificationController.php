<?php

namespace App\Http\Controllers\API\Customer;
use App\Http\Controllers\API\BaseController;

use App\Contracts\FcmInterface;
use Illuminate\Http\Request;

/**
 * Class FcmNotificationController
 * @package App\Http\Controllers
 */
class FcmNotificationController extends BaseController
{
    protected $notification;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct(FcmInterface $notification)
    {
        $this->notification = $notification;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = $this->notification->list('customerapi', 'pagination');
            return $this->sendResponse($data, 'Notification list get successfully.');
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Cart $cart
     * @return \Illuminate\Http\Response
     */
    public function read($id)
    {
        try {
            $data = $this->notification->update(['is_read' => true], $id);
            return $this->sendResponse($data, 'Notification read successfully.');
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }
}
