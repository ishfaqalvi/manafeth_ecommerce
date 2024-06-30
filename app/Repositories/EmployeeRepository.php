<?php

namespace App\Repositories;
use App\Mail\OTPMail;
use App\Services\AdminNotifyService;
use App\Models\{Token, Task, Employee};
use Illuminate\Support\Facades\{Auth, Hash, Mail};
use App\Contracts\{EmployeeInterface, MaintenenceInterface, SaleInterface, RentInterface};

class EmployeeRepository implements EmployeeInterface
{
    protected $order;
    protected $rent;
    protected $maintenence;
    protected $adminNotify;

    public function __construct(SaleInterface $order, MaintenenceInterface $maintenence, RentInterface $rent, AdminNotifyService $adminNotify){
        $this->order       = $order;
        $this->rent        = $rent;
        $this->maintenence = $maintenence;
        $this->adminNotify = $adminNotify;
    }

    public function list($filter = null, $pagination = false)
	{
        $query = Employee::query();
        $query->filter($filter);
		return $pagination ? $query->paginate() : $query->get();
	}

	public function new()
	{
		return new Employee();
	}

	public function store($data)
	{
		return Employee::create($data);
	}

	public function find($id)
	{
		return Employee::find($id);
	}

	public function update($data, $id)
	{
        if (!empty($data['new_password'])) {
            $data['password'] = $data['new_password'];
        }
		return Employee::find($id)->update($data);
	}

	public function delete($id)
	{
		return Employee::find($id)->delete();
	}

    public function checkEmail($data)
    {
        $query = Employee::query();
        if (isset($data['id'])) {
            $query->where('id','!=',$data['id']);
        }
        $employee = $query->where('email', $data['email'])->first();

        if($employee){ return true; }else{ return false;}
    }

    public function checkPassword($data)
    {
        $employee = Employee::find($data['id']);
        if(!Hash::check($data['old_password'], $employee->password)) { return false; }else{ return true;}
    }

    public function login($data)
    {
        $employee = Employee::whereEmail($data['email'])->first();
        if($employee && $employee->status == 'Active'){
            if (!Hash::check($data['password'], $employee->password)) {
                return ['status' => false, 'message' => 'Invalid credentials provided.'];
            }else{
                $employee->token = $employee->createToken('employee-token')->plainTextToken;
                return $employee;
            }
        }elseif($employee && $employee->status == 'Disable'){
            return ['status' => false, 'message' => 'Your accont is disabled contact your admin.'];
        }elseif($employee && $employee->status == 'Block'){
            return ['status' => false, 'message' => 'Your accont is blocked.'];
        }else{
            return ['status' => false, 'message' => 'No account registered against this email.'];
        }
    }

    public function logout()
    {
        return auth('employee')->user()->tokens()->delete();
    }

    public function forgotPassword($data)
    {
        $employee = Employee::whereEmail($data['email'])->first();
        if($employee){
            $otp = rand(1000, 9999);
            Token::updateOrCreate(['email' => $data['email']], [
                'email'      => $data['email'],
                'otp'        => $otp,
                'expiry_time'=> now()->addMinutes(10),
                'used'       => false
            ]);
            Mail::to($data['email'])->send(new OTPMail($otp, 'Forgot Password'));
            return true;
        }else{
            return false;
        }
    }

    public function resetPassword($data)
    {
        $record = Token::where('email', $data['email'])
                ->where('otp', $data['otp'] ?? '')
                ->where('expiry_time', '>', now())
                ->where('used', 0)
                ->first();
        if (!$record){
            return false;
        }else {
            $employee = Employee::whereEmail($data['email'])->first();
            $employee->update(['password' => $data['new_password']]);
            $record->delete();
            return true;
        }
    }

    public function taskList($type = null, $guard)
    {
        $orderRelations = [
            'order',
            'order.customer',
            'order.timeSlot',
            'order.details',
            'order.operations',
            'order.operations.actor',
            'order.details.services',
            'order.details.product.resources',
            'order.details.product.brand',
            'order.details.product.category',
            'order.details.product.subCategory',
            'order.details.product.reviews.order.customer'
        ];

        $rentRelations = [
            'rentRequest',
            'rentRequest.customer',
            'rentRequest.timeSlot',
            'rentRequest.details',
            'rentRequest.details.productRent',
            'rentRequest.details.product',
            'rentRequest.details.product.brand',
            'rentRequest.details.product.category',
            'rentRequest.details.product.subCategory',
            'rentRequest.details.product.resources',
            'rentRequest.details.product.rents',
            'rentRequest.details.product.reviews.order.customer',
            'rentRequest.operations',
            'rentRequest.operations.actor'
        ];

        $maintenenceRelations = [
            'maintenenceRequest',
            'maintenenceRequest.customer',
            'maintenenceRequest.category',
            'maintenenceRequest.product',
            'maintenenceRequest.operations',
            'maintenenceRequest.operations.actor'
        ];

        $query = Task::query();

        if(!is_null($type)){
            $query->whereTaskType($type);
        }
        $tasks = $query->whereEmployeeId(Auth::guard($guard)->user()->id)->orderBy('id', 'desc')->get();

        foreach ($tasks as $task) {
            if ($task->task_type == 'App\Models\Order') {
                $task->load($orderRelations);
            } elseif ($task->task_type == 'App\Models\RentRequest') {
                $task->load($rentRelations);
            } elseif ($task->task_type == 'App\Models\MaintenenceRequest') {
                $task->load($maintenenceRelations);
            }
        }
        return $tasks;
    }

    public function taskUpdate($data)
    {
        $task = Task::find($data['id']);
        $task->update($data);

        if(isset($data['order_status']) && $task->task_type == 'App\Models\Order'){
            if($task->status == 'Completed' && (isset($data['payment']) && isset($data['payment_method'])))
            {
                $update = ['payment' => $data['payment'], 'payment_method' => $data['payment_method'], 'status' => $data['order_status']];
            }else{
                $update = ['status' => $data['order_status']];
            }
            $this->order->orderUpdate($update, $task->task_id, 'employee');
        }

        if($task->status == 'Accept' && $task->task_type == 'App\Models\MaintenenceRequest'){
            $this->maintenence->update(['status' => 'Ready to go'], $task->task_id, 'employee');
        }
        if($task->status == 'Ongoing' && $task->task_type == 'App\Models\MaintenenceRequest'){
            $this->maintenence->update(['status' => 'Out for Maintenance'], $task->task_id, 'employee');
        }
        if($task->status == 'Completed' && $task->task_type == 'App\Models\MaintenenceRequest'){
            $this->maintenence->update(['status' => 'Done', 'payment' => $data['payment'], 'payment_method' => $data['payment_method']], $task->task_id, 'employee');
        }

        if(isset($data['order_status']) && $task->task_type == 'App\Models\RentRequest'){
            if($task->status == 'Completed' && (isset($data['payment']) && isset($data['payment_method'])))
            {
                $update = ['payment' => $data['payment'], 'payment_method' => $data['payment_method'], 'status' => $data['order_status']];
            }else{
                $update = ['status' => $data['order_status']];
            }
            $this->rent->orderUpdate($update, $task->task_id, 'employee');
        }

        if(settings('employee_task_update_fcm_notification_to_admin') == 'Yes'){
            $data = [
                'title'  => 'Task Update',
                'body'   => 'Assigned Task updated from '. $task->employee->name,
                'type'   => 'Sale Order',
                'id'     => $task->id,
                'name'   => $task->employee->name,
                'image'  => $task->employee->image,
                'message'=> 'Task updated click on link to see detail',
            ];
            $this->adminNotify->sendNotification($data);
        }
    }
}
