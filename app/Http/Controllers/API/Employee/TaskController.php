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
            $data = $this->employee->taskList(null, 'employee');
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
            $this->employee->taskUpdate($request->all());
            return $this->sendResponse('', 'Task updated successfully.');
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }
}
