<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomepageBannerSecond;
use Livewire\Component;

class AdminHomepageBannerSecondComponent extends Component
{
	public $HomepageBannerSecond_id;

    protected $listeners = ['deleteConfirmed' => 'deleteHomepageBannerSecond'];

    public function deleteConfirmation($id) {
        $this->HomepageBannerSecond_id = $id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

	public function deleteHomepageBannerSecond()
    {
        $HomepageBannerSecond = HomepageBannerSecond::where('id', $this->HomepageBannerSecond_id)->first();
        $HomepageBannerSecond->delete();
        $this->dispatchBrowserEvent('HomepageBannerSecondDelete');

    }
	
    public function render()
    {
    	$homepageBannerSeconds = HomepageBannerSecond::all();

        return view('livewire.admin.admin-homepage-banner-second-component', ['homepageBannerSeconds' =>$homepageBannerSeconds])->layout('layouts.admin.base');
    }
}


