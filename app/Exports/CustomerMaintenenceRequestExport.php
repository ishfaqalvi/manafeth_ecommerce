<?php

namespace App\Exports;

use App\Models\RentOrder;
use Maatwebsite\Excel\Concerns\FromCollection;

class CustomerMaintenenceRequestExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return RentOrder::all();
    }
}
