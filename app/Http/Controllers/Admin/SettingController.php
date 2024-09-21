<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;
use App\Models\Setting;
use Image;
use OneSignal;
use Illuminate\Support\Facades\Log;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        // $this->middleware('permission:tool-list',  ['only' => ['index']]);
        // $this->middleware('permission:tool-create',['only' => ['create','save']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function general()
    {
        return view('admin.settings.general');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function website()
    {
        return view('admin.settings.website');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function twilio()
    {
        return view('admin.settings.twilio');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function whatsapp()
    {
        return view('admin.settings.whatsapp');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fcm()
    {
        return view('admin.settings.fcm');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function clearCache()
    {
        Artisan::call('optimize');
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        return redirect()->back()->with('success', 'Optimization completed! successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        $data = [];

        if ($request->values) {
            foreach ($request->input('values') as $key => $value) {
                $data[] = ['key' => $key, 'value' => $value];
            }
        }

        foreach ($request->file() as $key => $file) {
            if ($image = $request->file($key)) {
                $filenametostore = uploadFile($image, 'settings');
                $data[] = ['key' => $key,'value' => $filenametostore];
            }
        }

        Setting::set($data);
        return redirect()->back()->with('success', 'Settings updated successfully.');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function testNotification()
    {
        try {
            OneSignal::sendNotificationToAll(
                "Some Message for all users",
                $url = null,
                $data = null,
                $buttons = null,
                $schedule = null
            );
            Log::info('Notification sent all successfully.');
        } catch (\Exception $e) {
            Log::error('Error sending notification all: ', ['error' => $e->getMessage()]);
        }
        try {
            OneSignal::sendNotificationToUser(
                "Some Message for specific user",
                "4b8e9bb6-3a99-4d11-bde3-212bf6d872d1",
                $url = null,
                $data = null,
                $buttons = null,
                $schedule = null
            );
            Log::info('Notification sent to specific user successfully.');
        } catch (\Exception $e) {
            Log::error('Error sending notification specific user: ', ['error' => $e->getMessage()]);
        }
        return redirect()->back()->with('success', 'Notification send successfully.');
    }
}
