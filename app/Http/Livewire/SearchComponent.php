<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Category;
use App\Models\Sale;
use Livewire\Component;
use App\Models\ShoppageBanner;
use Livewire\WithPagination;
use Cart;

class SearchComponent extends Component
{
    public $sorting;
    public $pagesize;

    public $search;
    public $product_cat;
    public $product_cat_id;

    public $min_price;
    public $max_price;

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

    public function mount()
    {
        $this->sorting = "default";
        $this->pagesize = 12;
        $this->fill(request()->only('search', 'product_cat','product_cat_id'));
    }

    use WithPagination;

    public function render()
    {
        if($this->sorting=='date')
        {
            $products = Product::where('name', 'like', '%'.$this->search .'%')->where('category_id', 'like', '%'.$this->product_cat_id. '%')->orderBy('created_at','DESC')->paginate($this->pagesize);
        }
        else if($this->sorting=="price")
        {
            $products = Product::where('name', 'like', '%'.$this->search .'%')->where('category_id', 'like', '%'.$this->product_cat_id. '%')->orderBy('regular_price', 'ASC')->paginate($this->pagesize);
        } 
        else if($this->sorting=="price-desc")
        {
            $products = Product::where('name', 'like', '%'.$this->search .'%')->where('category_id', 'like', '%'.$this->product_cat_id. '%')->orderBy('regular_price', 'DESC')->paginate($this->pagesize);
        } 
        else{
            $products = Product::where('name', 'like', '%'.$this->search .'%')->where('category_id', 'like', '%'.$this->product_cat_id. '%')->paginate($this->pagesize);            
        }
        
        $categories = Category::all(); 
        $sale = Sale::find(1);
        $ShoppageBanner = ShoppageBanner::where('status', 1)->get()->first();

        return view('livewire.search-component', ['products'=> $products, 'categories'=>$categories, 'sale'=>$sale, 'ShoppageBanner'=> $ShoppageBanner])->layout('layouts.base');
        }
    }
