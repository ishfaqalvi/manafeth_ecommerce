<?php

namespace App\Repositories;
use App\Models\Task;
use App\Models\Customer;
use App\Contracts\FcmInterface;
use App\Services\WhatsAppService;
use App\Models\MaintenenceRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Contracts\MaintenenceInterface;

class MaintenenceRepository implements MaintenenceInterface
{
    protected $whatsAppService;
    protected $fcmNotification;

    public function __construct(
        WhatsAppService $whatsAppService,
        FcmInterface $fcmNotification
    ){
        $this->whatsAppService = $whatsAppService;
        $this->fcmNotification = $fcmNotification;
    }

    public function list($guard = null, $pagination = false)
    {
        $query = MaintenenceRequest::query();

        if (!is_null($guard)) {
            $query->whereCustomerId(Auth::guard($guard)->user()->id);
        }
        $query->with(['customer','category','product','product.brand', 'product.category', 'product.subCategory','operations']);
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
                    $data['first_name'].' '.$data['last_name'],
                    $data['phone_number'],
                    $record->category->name,
                    $record->product->name,
                    $data['message']
                ];
                $this->whatsAppService->sendMessage('maintenance_req_submitted', $data);
            }
            if(settings('maintenence_request_fcm_notification') == 'Yes' && $guard == 'customerapi'){
                $data = [
                    'title' => 'Maintenence Request',
                    'body' => 'Your maintenence request has been submitted successfully.',
                    'customer_id' => $customer->id
                ];
                $this->fcmNotification->store($data);
            }
        });
    }

	public function find($id)
    {
        return MaintenenceRequest::with(['customer','category','product','product.brand', 'product.category', 'product.subCategory','operations'])->find($id);
    }

	public function update($data, $id, $guard)
    {
        DB::transaction(function () use ($data, $id, $guard) {
            $request = MaintenenceRequest::find($id);
            $actorId = $guard == 'Admin' ? auth()->user()->id : $request->customer->id;
            $actorType = $guard == 'Admin' ? 'App\Models\User' : 'App\Models\Customer';

            switch ($data['status']) {
                case 'Rejected':
                    $request->operations()->create([
                        'actor_id'   => $actorId,
                        'actor_type' => $actorType,
                        'action'     => 'Request Rejected'
                    ]);
                    break;

                case 'Accepted':
                    $request->operations()->create([
                        'actor_id'   => auth()->user()->id,
                        'actor_type' => 'App\Models\User',
                        'action'     => 'Request Accepted'
                    ]);
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
                        'task_id'     => $request->id,
                        'status'      => 'Pending'
                    ]);
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
                    break;

                case 'Done':
                    $request->operations()->create([
                        'actor_id'   => Auth::guard('employee')->user()->id,
                        'actor_type' => 'App\Models\Employee',
                        'action'     => 'Request completed by maintenence boy.'
                    ]);
                    break;

                case 'Add Payment':
                    $request->operations()->create([
                        'actor_id' => auth()->user()->id,
                        'actor_type' => 'App\Models\User',
                        'action' => 'Request payment added by admin.'
                    ]);
                    $request->operations()->create([
                        'actor_id' => auth()->user()->id,
                        'actor_type' => 'App\Models\User',
                        'action' => 'Request closed by admin.'
                    ]);
                    $data['status'] = 'Closed';
                    $data['payment_received'] = 'Yes';
                    break;
            }
            $request->update($data);
            if (settings('maintenence_request_fcm_notification') == 'Yes') {
                if($request->status == 'Out for Maintenance'){
                    $technician = Auth::guard('employee')->user();
                    $body = 'Your maintenance request has been assigned! Our technician, '. $technician->name .', will address your issue soon. You can contact them at '. $technician->mobile_number.' if you have any questions or concerns. Thank you for choosing us!';

                }else{
                    $body = 'Your reqeust has been ' . $data['status'] . ' successfully.';
                }
                $fcmData = [
                    'title' => 'Maintenance Request ' . $data['status'],
                    'body' => $body,
                    'customer_id' => $request->customer->id
                ];
                $this->fcmNotification->store($fcmData);
            }
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
