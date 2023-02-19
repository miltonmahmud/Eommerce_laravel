<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\HomepageBannerSecond;
use Carbon\Carbon;

class AdminAddHomepageBannerSecondComponent extends Component
{
    use WithFileUploads;

    public $title;
    public $text;
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
        
        $banner = new HomepageBannerSecond();
        $banner->title = $this->title;
        $banner->text = $this->text;
        $banner->subtitle = $this->subtitle;
        $banner->link = $this->link;
        $imagename = Carbon::now()->timestamp. '.' . $this->image->extension();
        $this->image->storeAs('banners',$imagename);                                              
        $banner->image = $imagename;
        $banner->status = $this->status;
        $banner->save();
        $this->dispatchBrowserEvent('AddHomepageBannerSecond');
    }                              

    public function render()
    {
        return view('livewire.admin.admin-add-homepage-banner-second-component')->layout('layouts.admin.base');
    }
}
