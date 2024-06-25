<?php

namespace App\Http\Controllers\API;
use App\Models\Task;

use App\Models\Order;

use Illuminate\Http\Request;
use App\Models\MaintenenceRequest;
use App\Http\Controllers\API\BaseController;

class TaskController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $orderRelations = [
                'customer',
                'timeSlot',
                'details',
                'operations',
                'operations.actor',
                'tasks',
                'tasks.employee',
                'details.services',
                'details.product.brand',
                'details.product.category',
                'details.product.resources',
                'details.product.subCategory',
                'details.product.reviews.order.customer'
            ];

            $maintenenceRelations = [
                'customer',
                'category',
                'product',
                'product.brand',
                'product.category',
                'product.subCategory',
                'operations',
                'operations.actor',
                'tasks',
                'tasks.employee'
            ];

            // $tasks = Task::orderBy('id', 'desc')->get();

            // foreach ($tasks as $task) {
            //     if ($task->task_type == 'App\Models\Order') {
            //         $task->load($orderRelations);
            //     } elseif ($task->task_type == 'App\Models\RentRequest') {
            //         $task->load($rentRelations);
            //     } elseif ($task->task_type == 'App\Models\MaintenenceRequest') {
            //         $task->load($maintenenceRelations);
            //     }
            // }
            $serialNumber = $request->serial_number;

            $orders = Order::with($orderRelations)->whereHas('details', function ($detailQuery) use ($serialNumber) {
                $detailQuery->where('serial_number', 'like', $serialNumber);
            })->get();

            $maintenenceRequests = MaintenenceRequest::where('serial_number', 'like', $serialNumber)->with($maintenenceRelations)->get();

            $tasks = ['Sale Order' => $orders, 'Maintenence Requests' => $maintenenceRequests];
            return $this->sendResponse($tasks, 'Task list get successfully.');
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }
}
