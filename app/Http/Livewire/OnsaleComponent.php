<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Sale;
use Cart;
use Livewire\Component;

class OnsaleComponent extends Component
{
    // protected $listeners = ['refreshComponent'=>'$refresh'];

    

    public function store($product_id,$product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        // $this->emit('refreshComponent');
        $this->emitTo('cart-count-component', 'refreshComponent');
        $this->emitTo('exclusive-component', 'refreshComponent');
        // $this->emitTo('onsale-component', 'refreshComponent');
        
        return ;
    }

    public function removeFromCart($product_id)
    {
        foreach(Cart::instance('cart')->content() as $citem)
        {
         if($citem->id == $product_id)
            {                                   
              Cart::instance('cart')->remove($citem->rowId);
              // $this->emit('refreshComponent');
              $this->emitTo('cart-count-component', 'refreshComponent');
              $this->emitTo('exclusive-component', 'refreshComponent');
              // $this->emitTo('onsale-component', 'refreshComponent');
              return ;
            }
        }
    }

    public function render()
    {
    	$sproducts = Product::where('sale_price','>',0)->orderBy('regular_price', 'ASC')->get()->take(8);
    	$sale = Sale::find(1);
      return view('livewire.onsale-component', ['sproducts'=>$sproducts, 'sale'=>$sale]);
    }
}
