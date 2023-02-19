<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Setting;
use Livewire\Component;

class FooterComponent extends Component
{
    public function render()
    {
    	$categories = Category::orderBy('created_at','DESC')->get()->take(5);
        $setting = Setting::find(1);
        return view('livewire.footer-component',['setting'=>$setting, 'categories'=>$categories]);
    }
}
