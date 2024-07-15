<?php

namespace App\Repositories;

use Illuminate\Support\Facades\{DB,Auth};
use App\Models\{Task,Customer,MaintenenceRequest,Payment};
use App\Contracts\{FcmInterface,MaintenenceInterface};
use App\Services\{AdminNotifyService,WhatsAppService};

class MaintenenceRepository implements MaintenenceInterface
{
    protected $whatsAppService;
    protected $fcmNotification;
    protected $adminNotify;

    public function __construct(
        WhatsAppService $whatsAppService,
        FcmInterface $fcmNotification,
        AdminNotifyService $adminNotify
    ){
        $this->whatsAppService = $whatsAppService;
        $this->fcmNotification = $fcmNotification;
        $this->adminNotify     = $adminNotify;
    }

    public function list($guard = null, $pagination = false)
    {
        $query = MaintenenceRequest::query();

        if (!is_null($guard)) {
            $query->whereCustomerId(Auth::guard($guard)->user()->id);
        }
        $query->with(['customer','category','product','product.brand', 'product.category', 'product.subCategory','operations','operations.actor'])->orderBy('created_at', 'desc');
        return $pagination ? $query->paginate() : $query->get();
    }

	public function create()
    {
        return new MaintenenceRequest();
    }

	public function store($guard, $data)
    {
        if($guard == 'Admin'){
            $customer = Customer::find($data['customer_id']);
        }else{
            $customer = Auth::guard($guard)->user();
        }
        DB::transaction(function () use($guard, $data, $customer){
            $record = $customer->maintenenceRequests()->create($data);
            $record->operations()->create([
                'actor_id'   => $guard == 'Admin' ? auth()->user()->id : $customer->id,
                'actor_type' => $guard == 'Admin' ? 'App\Models\User' : 'App\Models\Customer',
                'action'     => 'Miantenance Requested Submitted'
            ]);
            if(settings('maintenence_request_whatsapp_notification') == 'Yes'){
                $data = [
                    $data['full_name'],
                    $data['phone_number'],
                    $record->category->name,
                    $record->product->name,
                    $data['message']
                ];
                $this->whatsAppService->sendMessage('maintenance_req_submitted', $data);
            }
            if(settings('maintenence_request_fcm_notification_to_customer') == 'Yes' && $guard == 'customerapi'){
                $data = [
                    'title'    => 'Maintenence Request',
                    'body'     => 'Your maintenence request has been submitted successfully.',
                    'user_type'=> 'App\Models\Customer',
                    'user_id'  => $customer->id
                ];
                $this->fcmNotification->store($data);
            }
            if(settings('maintenence_request_fcm_notification_to_admin') == 'Yes'){
                $data = [
                    'title'  => 'New Maintenence Request',
                    'body'   => 'New maintenence request received from '. $customer->name,
                    'type'   => 'Maintenence Request',
                    'id'     => $record->id,
                    'name'   => $customer->name,
                    'image'  => $customer->image,
                    'message'=> 'New maintenence request submit click on link to see detail',
                ];
                $this->adminNotify->sendNotification($data);
            }
        });
    }

	public function find($id)
    {
        return MaintenenceRequest::with(['customer','category','product','product.brand', 'product.category', 'product.subCategory','operations','operations.actor'])->find($id);
    }

	public function update($data, $id, $guard)
    {
        DB::transaction(function () use ($data, $id, $guard) {
            $request = MaintenenceRequest::find($id);
            $actorId = $guard == 'Admin' ? auth()->user()->id : $request->customer->id;
            $actorType = $guard == 'Admin' ? 'App\Models\User' : 'App\Models\Customer';
            $employeeFcm = false;
            $customerFcm = false;
            switch ($data['status']) {
                case 'Rejected':
                    $request->operations()->create([
                        'actor_id'   => $actorId,
                        'actor_type' => $actorType,
                        'action'     => 'Request Rejected'
                    ]);
                    if($task = $request->runningTask){
                        $task->update(['status' => 'Cancelled']);
                    }
                    $customerFcm = true;
                    break;

                case 'Accepted':
                    $request->operations()->create([
                        'actor_id'   => auth()->user()->id,
                        'actor_type' => 'App\Models\User',
                        'action'     => 'Request Accepted'
                    ]);
                    $customerFcm = true;
                    break;

                case 'Assigned':
                    $request->operations()->create([
                        'actor_id'   => auth()->user()->id,
                        'actor_type' => 'App\Models\User',
                        'action'     => 'Request assigned to maintenence boy.'
                    ]);
                    Task::create([
                        'employee_id' => $data['maintenenceboy'],
                        'task_type'   => 'App\Models\MaintenenceRequest',
                        'employee_service' => $data['employee_service'],
                        'task_id'     => $request->id,
                        'status'      => 'Pending'
                    ]);
                    $customerFcm = true;
                    $employeeFcm = true;
                    $employee = $data['maintenenceboy'];
                    break;

                case 'Ready to go':
                    $request->operations()->create([
                        'actor_id'   => Auth::guard('employee')->user()->id,
                        'actor_type' => 'App\Models\Employee',
                        'action'     => 'Request accepted by maintenence boy.'
                    ]);
                    break;

                case 'Out for Maintenance':
                    $request->operations()->create([
                        'actor_id'   => Auth::guard('employee')->user()->id,
                        'actor_type' => 'App\Models\Employee',
                        'action'     => 'Maintenence boys is going for service.'
                    ]);
                    $customerFcm = true;
                    break;

                case 'Done':
                    $request->operations()->create([
                        'actor_id'   => Auth::guard('employee')->user()->id,
                        'actor_type' => 'App\Models\Employee',
                        'action'     => 'Request completed by maintenence boy.'
                    ]);
                    $customerFcm = true;
                    break;
                case 'Closed':
                    $request->operations()->create([
                        'actor_id' => auth()->user()->id,
                        'actor_type' => 'App\Models\User',
                        'action' => 'Request closed by admin.'
                    ]);
                    break;
            }
            $request->update($data);
            if (settings('maintenence_request_fcm_notification_to_customer') == 'Yes' && $customerFcm) {
                if($request->status == 'Out for Maintenance'){
                    $technician = Auth::guard('employee')->user();
                    $body = 'Your maintenance request has been assigned! Our technician, '. $technician->name .', will address your issue soon. You can contact them at '. $technician->mobile_number.' if you have any questions or concerns. Thank you for choosing us!';

                }else{
                    $body = 'Your reqeust has been ' . $data['status'] . ' successfully.';
                }
                $fcmData = [
                    'title'     => 'Maintenance Request ' . $data['status'],
                    'body'      => $body,
                    'user_type' => 'App\Models\Customer',
                    'user_id'   => $request->customer->id
                ];
                $this->fcmNotification->store($fcmData);
            }
            if (settings('employee_task_fcm_notification') == 'Yes' && $employeeFcm) {
                $fcmData = [
                    'title'     => 'Maintenence Request Assign',
                    'body'      => 'New task assign to you check your task list',
                    'user_type' => 'App\Models\Employee',
                    'user_id'   => $employee
                ];
                $this->fcmNotification->store($fcmData);
            }
        });
        return true;
    }

    public function addPayment($data)
    {
        DB::transaction(function () use ($data) {
            Payment::create($data);
            $request = MaintenenceRequest::find($data['orderable_id']);
            $request->operations()->create([
                'actor_id'   => $data['collectable_id'],
                'actor_type' => $data['collectable_type'],
                'action'     => 'Request payment added.'
            ]);
        });
        return true;
    }

	public function delete($id)
    {
        $request = MaintenenceRequest::find($id);
        $request->operations()->delete();
        return $request->delete();
    }
}
