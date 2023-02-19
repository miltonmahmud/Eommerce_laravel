<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\ShoppageBanner;
use Carbon\Carbon;

class AdminAddShoppageBannerComponent extends Component
{
    use WithFileUploads;

    public $title;
    public $subtitle;
    public $link;
    public $image;
    public $status;

    public function mount() 
    {
        $this->status= 0;
    }

    public function addBanner()
    {
        $this->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'link' => 'required',
            'image' => 'required',
        ]);
        
        $banner = new ShoppageBanner();
        $banner->title = $this->title;
        $banner->subtitle = $this->subtitle;
        $banner->link = $this->link;
        $imagename = Carbon::now()->timestamp. '.' . $this->image->extension();
        $this->image->storeAs('banners',$imagename);                                              
        $banner->image = $imagename;
        $banner->status = $this->status;
        $banner->save();
        $this->dispatchBrowserEvent('AddShoppageBanner');
    }                              

    public function render()
    {
        return view('livewire.admin.admin-add-shoppage-banner-component')->layout('layouts.admin.base');
    }
}

