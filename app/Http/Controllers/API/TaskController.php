<?php

namespace App\Http\Controllers\API;
use App\Models\Task;

use App\Models\Order;

use Illuminate\Http\Request;
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
                'employee',
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
                'employee',
                'rentRequest',
                'rentRequest.customer',
                'rentRequest.timeSlot',
                'rentRequest.details',
                'rentRequest.details.product',
                'rentRequest.details.product.brand',
                'rentRequest.details.product.category',
                'rentRequest.details.product.subCategory',
                'rentRequest.details.product.resources',
                'rentRequest.details.product.reviews.order.customer',
                'rentRequest.operations',
                'rentRequest.operations.actor'
            ];

            $maintenenceRelations = [
                'employee',
                'maintenenceRequest',
                'maintenenceRequest.customer',
                'maintenenceRequest.category',
                'maintenenceRequest.product',
                'maintenenceRequest.operations',
                'maintenenceRequest.operations.actor'
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

            // Query to get tasks of type 'sale' and filter by product serial number
            $tasks = Task::with($orderRelations)->whereHasMorph(
                'task',
                [Order::class],
                function ($query) use ($serialNumber) {
                    $query->whereHas('details', function ($detailQuery) use ($serialNumber) {
                        $detailQuery->where('serial_number', $serialNumber);
                    });
                }
            )->get();
            return $this->sendResponse($tasks, 'Task list get successfully.');
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }
}
