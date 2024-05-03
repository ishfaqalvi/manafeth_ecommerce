<?php

namespace App\Repositories;
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
        $query->with(['product.brand', 'product.category', 'product.subCategory']);
        return $pagination ? $query->paginate() : $query->get();
    }

	public function create()
    {

    }

	public function store($guard, $data)
    {
        DB::transaction(function () use($guard, $data){
            $record = Auth::guard($guard)->user()->maintenenceRequests()->create($data);
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
        return MaintenenceRequest::find($id);
    }

	public function update($data, $id)
    {

    }

	public function delete($id)
    {
        return MaintenenceRequest::find($id)->delete();
    }
}
