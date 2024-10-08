<?php

namespace App\Exports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class CustomerRentOrdersExport implements FromArray, WithHeadings, WithEvents
{
    protected $customer;

    public function __construct($customerId)
    {
        $this->customer = Customer::with('rentRequests.details')->findOrFail($customerId);
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
        foreach ($this->customer->rentRequests as $order) {
            $data[] = ['Order ID:', $order->id, 'Order Date:', date('d M Y',$order->collection_date),'Payment Method:', $order->payment_method];

            $data[] = ['Product', 'From Date', 'To Date', 'Quantity', 'Price', 'Total'];

            foreach ($order->details as $detail) {
                $data[] = [
                    $detail->product->name,
                    date('d M Y', $detail->quantity),
                    date('d M Y',$detail->quantity),
                    $detail->quantity,
                    $detail->productRent->amount,
                    $detail->quantity * $detail->productRent->amount
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

                $sheet->getStyle('A1:D1')->getFont()->setBold(true);
            },
        ];
    }
}
