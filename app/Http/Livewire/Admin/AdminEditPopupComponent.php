<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Popup;
use Carbon\Carbon;

class AdminEditPopupComponent extends Component
{
	use WithFileUploads;

    public $title;
    public $subtitle;
    public $image;
    public $status;
    public $newimage;

    public function mount($Popup_id)
    {
        $Popup = Popup::find($Popup_id);
        $this->title = $Popup->title;
        $this->subtitle = $Popup->subtitle;
        $this->image = $Popup->image;
        $this->status = $Popup->status;
        $this->Popup_id = $Popup->id;
    }

    public function updated($fields)
     {
        $this->validateOnly($fields, [
        "title" => "required",
        "subtitle" => "required",
        "image" => "required",
        "status" => "required"
        ]);
     }

     public function updatePopup()
     {
        $this->validate([
            "title" => "required",
	        "subtitle" => "required",
	        "image" => "required",
	        "status" => "required"
            ]);

        $popup = Popup::find($this->Popup_id);
        $popup->title = $this->title;
        $popup->subtitle = $this->subtitle;
        if($this->newimage)
        {
            $imagename = Carbon::now()->timestamp. '.' . $this->newimage->extension();
            $this->newimage->storeAs ('banners',$imagename);
            $popup->image = $imagename; 
        }
        $popup->status = $this->status;
        $popup->save();
        $this->dispatchBrowserEvent('popupUpdate');
     }

    public function render()
    {
        return view('livewire.admin.admin-edit-popup-component')->layout('layouts.admin.base');
    }
}
