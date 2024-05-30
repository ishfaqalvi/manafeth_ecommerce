<?php

namespace App\Repositories;
use App\Models\Task;
use App\Mail\OTPMail;
use App\Models\Token;
use App\Models\Employee;
use App\Contracts\EmployeeInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class EmployeeRepository implements EmployeeInterface
{
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

    public function taskList($guard)
    {
        $orderRelations = [
            'task',
            'task.customer',
            'task.timeSlot',
            'task.details',
            'task.operations',
            'task.operations.actor',
            'task.details.services',
            'task.details.product.resources',
            'task.details.product.brand',
            'task.details.product.category',
            'task.details.product.subCategory',
            'task.details.product.reviews.order.customer'
        ];
        // return Task::whereEmployeeId(Auth::guard($guard)->user()->id)->with(function ($query) use($orderRelations){
        //     if ($query->task_type == 'App\Models\Order')
        //     {
        //         return $query->with($orderRelations);
        //     }
        //     elseif ($query->task_type == 'details')
        //     {
        //         return $query->with('taskDetails');
        //     }
        // })->get();
        return Task::whereEmployeeId(Auth::guard($guard)->user()->id)->with($orderRelations)->get();
    }

    public function taskUpdate()
    {
        $orderRelations = [
            'task',
            'task.customer',
            'task.timeSlot',
            'task.details',
            'task.operations',
            'task.operations.actor',
            'task.details.services',
            'task.details.product.resources',
            'task.details.product.brand',
            'task.details.product.category',
            'task.details.product.subCategory',
            'task.details.product.reviews.order.customer'
        ];
        // return Task::whereEmployeeId(Auth::guard($guard)->user()->id)->with(function ($query) use($orderRelations){
        //     if ($query->task_type == 'App\Models\Order')
        //     {
        //         return $query->with($orderRelations);
        //     }
        //     elseif ($query->task_type == 'details')
        //     {
        //         return $query->with('taskDetails');
        //     }
        // })->get();
        return Task::whereEmployeeId(Auth::guard($guard)->user()->id)->with($orderRelations)->get();
    }
}
