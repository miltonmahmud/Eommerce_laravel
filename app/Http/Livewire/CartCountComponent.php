<?php

namespace App\Http\Livewire;

use App\Models\Sale;
use Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartCountComponent extends Component
{
    protected $listeners = ['refreshComponent'=>'$refresh']; 

    public function checkout()
    {
        if(Auth::check())
        {
            return redirect()->route('checkout');
        }
        else
        {
            return redirect()->route('login');
        }
    }

    public function destroy ($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        $this->emitTo('cart-count-component', 'refreshComponent');
        $this->emitTo('exclusive-component', 'refreshComponent');
        $this->emitTo('onsale-component', 'refreshComponent');
        $this->emitTo('cart-component', 'refreshComponent');
        session()->flash('success_message', 'Item has been removed');
    }
    
    public function render()
    {
    	$sale = Sale::find(1);
        return view('livewire.cart-count-component', ['sale'=>$sale]);
    }
}
