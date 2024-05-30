<?php

namespace App\Http\Controllers\API\Employee;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Contracts\EmployeeInterface;
use App\Http\Controllers\API\BaseController;

/**
 * Class TaskController
 * @package App\Http\Controllers
 */
class TaskController extends BaseController
{
    protected $employee;

    public function __construct(EmployeeInterface $employee){
        $this->employee = $employee;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = $this->employee->taskList('employee');
            return $this->sendResponse($data, 'Task list get successfully.');
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Task $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            $task = Task::find($request->id);
            $task->update($request->all());
            if(isset($request->order_status)){
                $this->order->orderUpdate(['status' => $request->order_status], $task->task_id, 'employee');
            }
            return $this->sendResponse('', 'Task updated successfully.');
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }
}
