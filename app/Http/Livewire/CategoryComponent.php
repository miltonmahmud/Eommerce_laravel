<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Livewire\Component;
use App\Models\ShoppageBanner;
use Livewire\WithPagination;
use App\Models\Sale;
use Cart;

class CategoryComponent extends Component
{
    public $sorting;
    public $pagesize;

    public $min_price;
    public $max_price;

    public $category_slug;
    public $scategory_slug;

    public function mount($category_slug, $scategory_slug=null)
    {
        $this->sorting = "default";
        $this->pagesize = 12;
        $this->min_price = 1;
        $this->max_price = 500;
        $this->category_slug = $category_slug;
        $this->scategory_slug = $scategory_slug;
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
        $category_id = null;
        $category_name = "";
        $filter = "";

        if($this->scategory_slug)
        {
             $scategory = Subcategory::where('slug',$this->scategory_slug)->first();
             $category_id = $scategory->id;
             $category_name = $scategory->name;
             $filter = "sub";
        }
        else
        {
            $category = Category::where('slug',$this->category_slug)->first(); 
            $category_id = $category->id;
            $category_name = $category->name;
            $filter = "";
        }
   
        if($this->sorting=='date')
        {
            $products = Product::where($filter.'category_id',$category_id)->orderBy('created_at','DESC')->paginate($this->pagesize);
        }
        else if($this->sorting=="price")
        {
            $products = Product::where($filter.'category_id',$category_id)->orderBy('regular_price', 'ASC')->paginate($this->pagesize);
        } 
        else if($this->sorting=="price-desc")
        {
            $products = Product::where($filter.'category_id',$category_id)->orderBy('regular_price', 'DESC')->paginate($this->pagesize);
        } 
        else{
            $products = Product::where($filter.'category_id',$category_id)->paginate($this->pagesize);         
        }
        
        $categories = Category::all();
        $ShoppageBanner = ShoppageBanner::where('status', 1)->get()->first();
        $sale = Sale::find(1);

        return view('livewire.category-component', ['products'=> $products, 'categories'=>$categories,'category_name'=>$category_name, 'sale'=>$sale, 'ShoppageBanner'=>$ShoppageBanner])->layout('layouts.base');
        }
    }
