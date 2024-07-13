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
        $data = array();
        if ($request->values) {
            foreach ($_POST['values'] as $key => $value) {
                $data[] = array(
                    'key'   => $key,
                    'value' => $value
                );
            }
        }
        foreach ($request->file() as $key => $file) {
            if ($file = $request->file($key)) {
                $filename = time() . '.' . $file->getClientOriginalExtension();

                // Check if the file is an image
                if (in_array($file->getClientOriginalExtension(), ['jpg', 'jpeg', 'png', 'gif'])) {
                    // Resize the image
                    $image = Image::make($file);
                    $image->resize(300, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });

                    // Save the resized image to a specific folder
                    $image->save(public_path('images/settings/' . $filename));

                    $filenametostore = 'images/settings/'. $filename;
                } else {
                    // Move the file to a specific folder as is
                    $file->move(public_path('uploads/files'), $filename);
                    $filenametostore = 'uploads/files/'. $filename;
                }

                // $filenamewithextension = $image->getClientOriginalName();
                // $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
                // $filenametostore = 'upload/images/settings/' . $filename . '_' . time() . '.webp';
                // // $img = Image::make($image)->encode('webp', 90)->resize(100 , 200)->save(public_path($filenametostore));
                // $img = Image::make($image)->encode('webp', 90)->save(public_path($filenametostore));
            }
            $data[] = array(
                'key'    => $key,
                'value'  => $filenametostore
            );
        }
        Setting::set($data);
        return redirect()->back()->with('success', 'Setting updated successfully.');
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
