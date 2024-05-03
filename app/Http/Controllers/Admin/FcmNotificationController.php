<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;

use App\Contracts\FcmInterface;
use App\Models\FcmNotification;
use App\Http\Controllers\Controller;

/**
 * Class FcmNotificationController
 * @package App\Http\Controllers
 */
class FcmNotificationController extends Controller
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
        $this->middleware('permission:fcmNotifications-list',  ['only' => ['index']]);
        $this->middleware('permission:fcmNotifications-view',  ['only' => ['show']]);
        $this->middleware('permission:fcmNotifications-create',['only' => ['create','store']]);
        $this->middleware('permission:fcmNotifications-edit',  ['only' => ['edit','update']]);
        $this->middleware('permission:fcmNotifications-delete',['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fcmNotifications = $this->notification->list(null, 'pagination');

        return view('admin.fcm-notification.index', compact('fcmNotifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fcmNotification = $this->notification->new();
        return view('admin.fcm-notification.create', compact('fcmNotification'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fcmNotification = $this->notification->store($request->all());
        return redirect()->route('fcm-notifications.index')
            ->with('success', 'FcmNotification created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fcmNotification = $this->notification->find($id);

        return view('admin.fcm-notification.show', compact('fcmNotification'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fcmNotification = $this->notification->find($id);

        return view('admin.fcm-notification.edit', compact('fcmNotification'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  FcmNotification $fcmNotification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->notification->update($request->all(), $id);

        return redirect()->route('fcm-notifications.index')
            ->with('success', 'FcmNotification updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $this->notification->delete($id);

        return redirect()->route('fcm-notifications.index')
            ->with('success', 'FcmNotification deleted successfully');
    }
}
