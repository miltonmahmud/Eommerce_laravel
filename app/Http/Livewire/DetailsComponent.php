<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Sale;
use Cart;

class DetailsComponent extends Component
{
    protected $listeners = ['refreshComponent'=>'$refresh'];
    
    public $slug;
    public $qty;
    public $satt=[];

    public function mount($slug)
    {
        $this->slug = $slug;
        $this->qty = 1;
    }

    public function store($product_id,$product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        $this->emitTo('cart-count-component', 'refreshComponent');
        $this->dispatchBrowserEvent('swal', [
            'title' => 'Item added into Cart',
            'timer'=>3000,
            'icon'=>'success',
            'toast'=>true,
            'position'=>'center',
            'showCancelButton'=> false,
            'showConfirmButton'=> false
        ]);
    }

    public function addToWishlist($product_id, $product_name, $product_price)
    {
        Cart::instance('wishlist')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        $this->emitTo('wishlist-count-component', 'refreshComponent');
        $this->dispatchBrowserEvent('swal', [
            'title' => 'Item added into Wishlist',
            'timer'=>3000,
            'icon'=>'success',
            'toast'=>true,
            'position'=>'center',
            'showCancelButton'=> false,
            'showConfirmButton'=> false
        ]);
    }

    public function addToCompare($product_id, $product_name, $product_price)
    {
        Cart::instance('compare')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        $this->emitTo('compare-component', 'refreshComponent');
        $this->dispatchBrowserEvent('swal', [
            'title' => 'Item added into Compare',
            'timer'=>3000,
            'icon'=>'success',
            'toast'=>true,
            'position'=>'center',
            'showCancelButton'=> false,
            'showConfirmButton'=> false
        ]);
    }

    public function increaseQuantity()
    {
        $this->qty++;
    }
    public function decreseQuantity()
    {
        if($this->qty > 1)
        {
             $this->qty--;
        }
    }


    public function render()
    {
        $product = Product::where('slug',$this->slug)->first();

        $popular_products = Product::inRandomOrder()->limit(4)->get();
  
        $related_products = Product::where('category_id',$product->category_id)->inRandomOrder()->limit(5)->get();
        $sale = Sale::find(1);
                  
                  

        return view('livewire.details-component',['product'=>$product, 'popular_products'=>$popular_products, 'related_products'=>$related_products, 'sale'=>$sale])->layout('layouts.base');                                                                         
    }
}
