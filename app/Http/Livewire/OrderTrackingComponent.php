<?php

namespace App\Http\Livewire;

use Livewire\Component;

class OrderTrackingComponent extends Component
{
    public function render()
    {
        return view('livewire.order-tracking-component')->layout('layouts.base');
    }
}
