<?php

namespace App\Exports;

use App\Models\RentOrder;
use Maatwebsite\Excel\Concerns\FromCollection;

class CustomerRentOrdersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return RentOrder::all();
    }
}
