<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Sale;
use Cart;

class WishlistComponent extends Component
{
    protected $listeners = ['refreshComponent'=>'$refresh'];

    public function removeFromWishlist($product_id)
    {
        foreach(Cart::instance('wishlist')->content() as $witem)
        {
         if($witem->id == $product_id)
            {                                   
              Cart::instance('wishlist')->remove($witem->rowId);
              $this->emitTo('wishlist-count-component', 'refreshComponent');
              session()->flash('message', 'Product deleted successfully!');
            }
        }
    }

    public function moveProductFromWishlistToCart($rowId)
    {
        $item = Cart::instance('wishlist')->get($rowId);
        Cart::instance('wishlist')->remove($rowId);
        Cart::instance('cart')->add($item->id,$item->name, 1,$item->price)->associate('App\Models\Product');
        $this->emitTo('wishlist-count-component','refreshComponent');
        $this->emitTo('cart-count-component','refreshComponent');
        session()->flash('message', 'Product moved into Cart successfully!');
    }

    public function render()
    {
        $sale = Sale::find(1);

        return view('livewire.wishlist-component', ['sale'=>$sale])->layout('layouts.base');
    }
}
