<?php

namespace App\Exports;

use App\Models\Order;
use App\Models\Customer;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class CustomerOrdersExport implements FromArray, WithHeadings, WithEvents
{
    protected $customer;

    public function __construct($customerId)
    {
        $this->customer = Customer::with('orders.details')->findOrFail($customerId);
    }

    /**
     * Prepare the data to export.
     *
     * @return array
     */
    public function array(): array
    {
        $data = [];

        // First section: Customer details (2 columns, label-value format)
        $data[] = ['Customer Name:', $this->customer->name];
        $data[] = ['Customer Email:', $this->customer->email];
        $data[] = ['Phone:', $this->customer->mobile_number];
        $data[] = ['Address:', $this->customer->address];

        // Empty row as a separator
        $data[] = ['', ''];

        // Iterate over each order and add its details
        foreach ($this->customer->orders as $order) {
            // Add order header
            $data[] = ['Order ID:', $order->id, 'Order Date:', $order->order_date];

            // Order Details heading
            $data[] = ['Product Name', 'Quantity', 'Price', 'Total'];

            // Add each order detail (Product details)
            foreach ($order->orderDetails as $detail) {
                $data[] = [
                    $detail->product_name,
                    $detail->quantity,
                    $detail->price,
                    $detail->quantity * $detail->price,
                ];
            }
            $data[] = ['', ''];
        }

        return $data;
    }

    /**
     * Define the headings for the Excel sheet.
     *
     * @return array
     */
    public function headings(): array
    {
        return [];  // Headings are dynamically generated within the array method.
    }

    /**
     * Apply styling and merging.
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();

                // Merge customer detail labels
                $sheet->mergeCells('A1:B1');
                $sheet->mergeCells('A2:B2');
                $sheet->mergeCells('A3:B3');
                $sheet->mergeCells('A4:B4');

                // Optional: Set bold for the order headings and customer details
                $sheet->getStyle('A1:A4')->getFont()->setBold(true);
                $sheet->getStyle('A6:D6')->getFont()->setBold(true);  // For the first order's heading row
            },
        ];
    }
}
