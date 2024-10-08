<?php

namespace App\Exports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class CustomerMaintenenceRequestExport implements FromArray, WithHeadings, WithEvents
{
    protected $customer;

    public function __construct($customerId)
    {
        $this->customer = Customer::with('maintenenceRequests')->findOrFail($customerId);
    }

    /**
     * Prepare the data to export.
     *
     * @return array
     */
    public function array(): array
    {
        $data = [];

        $data[] = ['Customer Name', 'Customer Email', 'Customer Mobile Number', 'Address'];
        $data[] = [$this->customer->name, $this->customer->email, $this->customer->mobile_number, $this->customer->address];

        $data[] = ['', ''];

        $data[] = ['Order ID:', 'Serial Number', 'Product', 'Message', 'Status'];
        foreach ($this->customer->maintenenceRequests as $order) {
            $data[] = [
                $order->request_no,
                $order->serial_number,
                $order->product->name,
                $order->message,
                $order->status
            ];
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

                $sheet->getStyle('A1:D1')->getFont()->setBold(true);
                $sheet->getStyle('A4:E4')->getFont()->setBold(true);
            },
        ];
    }
}
