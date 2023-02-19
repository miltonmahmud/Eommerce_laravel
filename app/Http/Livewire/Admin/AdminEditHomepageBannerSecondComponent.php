<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomepageBannerSecond;
use Livewire\Component;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class AdminEditHomepageBannerSecondComponent extends Component
{
    use WithFileUploads;

    public $title;
    public $subtitle;
    public $link;
    public $image;
    public $status;
    public $newimage;

    public function mount ($homepage_banner_second)
    {
        $banner = HomepageBannerSecond::find($homepage_banner_second);

        $this->title = $banner->title;
        $this->subtitle = $banner->subtitle;
        $this->link = $banner->link;
        $this->image = $banner->image;
        $this->status = $banner->status;
        $this->banner_id = $banner->id;
    }

    public function updateBanner()
    {
        $this->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'link' => 'required'
        ]);

        $banner = HomepageBannerSecond::find($this->banner_id);
        $banner->title = $this->title;
        $banner->subtitle = $this->subtitle;
        $banner->link = $this->link;
        
        if($this->newimage)
        {
            $imagename = Carbon::now()->timestamp. '.' . $this->newimage->extension();
            $this->newimage->storeAs ('banners',$imagename);
            $banner->image = $imagename; 
        }                                
    $banner->status = $this->status;
    $banner->save();
    $this->dispatchBrowserEvent('HomepageBannerSecondUpdate');
    }
    public function render()
    {
        return view('livewire.admin.admin-edit-homepage-banner-second-component')->layout('layouts.admin.base');
    }
}

