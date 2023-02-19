<?php

namespace App\Http\Livewire;

use Cart;
use App\Models\Sale;
use Livewire\Component;

class CompareComponent extends Component
{
    public $satt=[];
    
	public function removeFromCompare($product_id)
    {
        foreach(Cart::instance('compare')->content() as $witem)
        {
         if($witem->id == $product_id)
            {                                   
              Cart::instance('compare')->remove ($witem->rowId);
              $this->emitTo('compare-component', 'refreshComponent');
              return;
            }
        }
    }

    public function moveProductFromCompareToCart($rowId)
    {
        $item = Cart::instance('compare')->get($rowId);
        Cart::instance('compare')->remove($rowId);
        Cart::instance('cart')->add($item->id,$item->name, 1,$item->price)->associate('App\Models\Product');
        $this->emitTo('compare-component','refreshComponent');
        $this->emitTo('cart-count-component','refreshComponent');
    }

    public function render()
    {
    	$sale = Sale::find(1);

        return view('livewire.compare-component', ['sale'=>$sale])->layout('layouts.base');
    }
}
