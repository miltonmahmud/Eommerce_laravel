<?php

namespace App\Http\Livewire\Admin;

use App\Models\ShoppageBanner;
use Livewire\Component;

class AdminShoppageBannerComponent extends Component
{
	public $ShoppageBanner_id;

    protected $listeners = ['deleteConfirmed' => 'deleteShoppageBanner'];

    public function deleteConfirmation($id) {
        $this->ShoppageBanner_id = $id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

	public function deleteShoppageBanner()
    {
        $ShoppageBanner = ShoppageBanner::where('id', $this->ShoppageBanner_id)->first();
        $ShoppageBanner->delete();
        $this->dispatchBrowserEvent('ShoppageBannerDelete');

    }
	
    public function render()
    {
    	$ShoppageBanner = ShoppageBanner::all();

        return view('livewire.admin.admin-shoppage-banner-component', ['ShoppageBanner' =>$ShoppageBanner])->layout('layouts.admin.base');
    }
}
