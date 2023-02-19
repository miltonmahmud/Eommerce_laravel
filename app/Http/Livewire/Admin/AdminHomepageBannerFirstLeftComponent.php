<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomepageBannerFirstLeft;
use Livewire\Component;

class AdminHomepageBannerFirstLeftComponent extends Component
{
	public $homepageBannerFirstLeft_id;

    protected $listeners = ['deleteConfirmed' => 'deletehomepageBannerFirstLeft'];

    public function deleteConfirmation($id) {
        $this->homepageBannerFirstLeft_id = $id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

	public function deletehomepageBannerFirstLeft()
    {
        $homepageBannerFirstLeft = homepageBannerFirstLeft::where('id', $this->homepageBannerFirstLeft_id)->first();
        $homepageBannerFirstLeft->delete();
        $this->dispatchBrowserEvent('homepageBannerFirstLeftDelete');

    }
	
    public function render()
    {
    	$homepageBannerFirstLefts = HomepageBannerFirstLeft::all();

        return view('livewire.admin.admin-homepage-banner-first-left-component', ['homepageBannerFirstLefts' =>$homepageBannerFirstLefts])->layout('layouts.admin.base');
    }
}
