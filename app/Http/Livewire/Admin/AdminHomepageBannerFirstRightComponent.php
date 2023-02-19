<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomepageBannerFirstRight;
use Livewire\Component;

class AdminHomepageBannerFirstRightComponent extends Component
{
	public $HomepageBannerFirstRight_id;

    protected $listeners = ['deleteConfirmed' => 'deleteHomepageBannerFirstRight'];

    public function deleteConfirmation($id) {
        $this->HomepageBannerFirstRight_id = $id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

	public function deleteHomepageBannerFirstRight()
    {
        $HomepageBannerFirstRight = HomepageBannerFirstRight::where('id', $this->HomepageBannerFirstRight_id)->first();
        $HomepageBannerFirstRight->delete();
        $this->dispatchBrowserEvent('HomepageBannerFirstRightDelete');

    }
	
    public function render()
    {
    	$homepageBannerFirstRights = HomepageBannerFirstRight::all();

        return view('livewire.admin.admin-homepage-banner-first-right-component', ['homepageBannerFirstRights' =>$homepageBannerFirstRights])->layout('layouts.admin.base');
    }
}
