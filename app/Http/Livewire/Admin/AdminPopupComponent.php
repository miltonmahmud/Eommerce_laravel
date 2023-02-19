<?php

namespace App\Http\Livewire\Admin;

use App\Models\Popup;
use Livewire\Component;

class AdminPopupComponent extends Component
{
    public $popup_id;

    protected $listeners = ['deleteConfirmed' => 'deletePopup'];

    public function deleteConfirmation($id) {
        $this->popup_id = $id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

	public function deletePopup()
    {
        $popup = Popup::where('id', $this->popup_id)->first();
        $popup->delete();
        $this->dispatchBrowserEvent('popupDelete');

    }

    public function render()
    {
    	$popups = Popup::all();
        return view('livewire.admin.admin-popup-component', ['popups'=>$popups])->layout('layouts.admin.base');
    }
}
