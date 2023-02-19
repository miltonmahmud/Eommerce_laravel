<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrderExport implements FromCollection, WithHeadings
{

	public function headings():array{
		return[
			'Id',
			'Firstname',
			'Lastname',
			'Mobile',
			'Email',
			'Subtotal',
			'Total',
			'Discount',
			'Tax',
			'Country',
			'Province',
			'Zipcode',
			'Status'
		];
	}

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
    	return collect(Order::getOrder());
        // return Order::all();
    }
}
