<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\HomeCategory;
use App\Models\Sale;
use Cart;
use Livewire\Component;

class ExclusiveComponent extends Component
{
	protected $listeners = ['refreshComponent'=>'$refresh'];

	public $email;
    public $qty;
    public $satt=[];

    public function mount()
    {
        $this->qty = 1;
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

    public function modalstore($product_id,$product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id,$product_name,$this->qty,$product_price)->associate('App\Models\Product');
        $this->emitTo('cart-count-component', 'refreshComponent');
        $this->emitTo('home-component', 'refreshComponent');
        return redirect()->route('product.cart');
    }

    public function render()
    {
    	$category = HomeCategory::find(1);
    	$cats = explode(',',$category->sel_categories);
    	$categories = Category::whereIn('id',$cats)->get();
    	$no_of_products = $category->no_of_products;
    	$sale = Sale::find(1);
        return view('livewire.exclusive-component', ['categories'=>$categories, 'no_of_products'=>$no_of_products, 'sale'=>$sale]);
    }
}
