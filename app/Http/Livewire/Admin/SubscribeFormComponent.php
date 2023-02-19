<?php

namespace App\Http\Livewire\Admin;

use App\Models\Subscriber;
use Livewire\Component;

class SubscribeFormComponent extends Component
{
	public $email;

    public function addSubscriber()
    {
        $this->validate([
             'email' => 'required|email'
        ]);

        $subscriber = new Subscriber();
        $subscriber->email = $this->email;
        $subscriber->save();
        session()->flash('message','Thanks, You have subscribed!');
    }

    public function render()
    {
        return view('livewire.admin.subscribe-form-component')->layout('layouts.admin.base');
    }
}
