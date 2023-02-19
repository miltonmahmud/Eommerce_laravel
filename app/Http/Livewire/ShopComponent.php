<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Category;
use App\Models\ShoppageBanner;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use App\Models\Sale;
use Cart;

class ShopComponent extends Component
{
    protected $listeners = ['refreshComponent'=>'$refresh'];
    
    public $sorting;
    public $pagesize;

    public $min_price;
    public $max_price;

    public function mount()
    {
        $this->sorting = "default";
        $this->pagesize = 12;

        $this->min_price = 1;
        $this->max_price = 500;
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

    use WithPagination;

    public function render()
    {
        if($this->sorting=='date')
        {
            $products = Product::whereBetween('regular_price', [$this->min_price,$this->max_price])->orderBy('created_at','DESC')->paginate($this->pagesize);
        }
        else if($this->sorting=="price")
        {
            $products = Product::whereBetween('regular_price', [$this->min_price,$this->max_price])->orderBy('regular_price', 'ASC')->paginate($this->pagesize);
        } 
        else if($this->sorting=="price-desc")
        {
            $products = Product::whereBetween('regular_price', [$this->min_price,$this->max_price])->orderBy('regular_price', 'DESC')->paginate($this->pagesize);
        } 
        else{
            $products = Product::whereBetween('regular_price', [$this->min_price,$this->max_price])->paginate($this->pagesize);            
        }
        
        $categories = Category::all();

         if(Auth::check())
         {
            Cart::instance('cart')->store(Auth::user()->email);
            Cart::instance('wishlist')->store(Auth::user()->email);
         }

         $sale = Sale::find(1);
         $ShoppageBanner = ShoppageBanner::where('status', 1)->get()->first();

        return view('livewire.shop-component', ['products'=> $products, 'categories'=>$categories, 'sale'=>$sale, 'ShoppageBanner'=>$ShoppageBanner])->layout('layouts.base');
        }
    }
