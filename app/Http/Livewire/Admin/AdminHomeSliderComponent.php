<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\HomeSlider;

class AdminHomeSliderComponent extends Component
{
    public $HomeSlider_id;

    protected $listeners = ['deleteConfirmed' => 'deleteHomeSlider'];

    public function deleteConfirmation($id) {
        $this->HomeSlider_id = $id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function deleteHomeSlider()
    {
        $HomeSlider = HomeSlider::where('id', $this->HomeSlider_id)->first();
        $HomeSlider->delete();
        $this->dispatchBrowserEvent('HomeSliderDelete');

    }

    public function render()
    {
        $sliders = HomeSlider::all();
        return view('livewire.admin.admin-home-slider-component', ['sliders'=>$sliders])->layout('layouts.admin.base');
    }
}
