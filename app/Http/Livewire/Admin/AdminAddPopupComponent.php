<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Popup;
use Carbon\Carbon;

class AdminAddPopupComponent extends Component
{
    use WithFileUploads;

    public $title;
    public $subtitle;
    public $image;
    public $status;

    public function mount() 
    {
        $this->status= 0;
    }

    public function addPopup()
    {
        $this->validate([
        'title' => 'required',
        'subtitle' => 'required',
        'image' => 'required'
    ]);

        $popup = new Popup();
        $popup->title = $this->title;
        $popup->subtitle = $this->subtitle;
        $imagename = Carbon::now()->timestamp. '.' . $this->image->extension();
        $this->image->storeAs('banners',$imagename);                                              
        $popup->image = $imagename;
        $popup->status = $this->status;
        $popup->save();
        $this->dispatchBrowserEvent('addPopup');
    }                              

    public function render()
    {
        return view('livewire.admin.admin-add-popup-component')->layout('layouts.admin.base');
    }
}

