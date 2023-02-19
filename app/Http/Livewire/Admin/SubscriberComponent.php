<?php

namespace App\Http\Livewire\Admin;

use App\Models\Subscriber;
use Livewire\Component;
use App\Exports\SubscriberExport;
use Excel;

class SubscriberComponent extends Component
{
	public function exportIntoExcel() {
		return Excel::download(new SubscriberExport, 'SubscriberList.xlsx');
	}

	public function exportIntoCSV() {
		return Excel::download(new SubscriberExport, 'SubscriberList.csv');
	}

    public function render()
    {
    	$subscribers = Subscriber::all();
        return view('livewire.admin.subscriber-component', ['subscribers'=>$subscribers])->layout('layouts.admin.base');
    }
}
