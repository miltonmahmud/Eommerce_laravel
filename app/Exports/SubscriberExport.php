<?php

namespace App\Exports;

use App\Models\Subscriber;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SubscriberExport implements FromCollection, WithHeadings
{

	public function headings():array{
		return[
			'Id',
			'Email',
			'Created_at'
		];
	}

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Subscriber::all();
        return collect(Subscriber::getSubscriber());
    }
}
