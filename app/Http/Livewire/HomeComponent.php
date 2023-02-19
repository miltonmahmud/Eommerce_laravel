<?php

namespace App\Http\Livewire;

use App\Models\HomeSlider;
use App\Models\HomeCategory;
use App\Models\HomepageBannerFirstLeft;
use App\Models\HomepageBannerFirstRight;
use App\Models\HomepageBannerSecond;
use App\Models\Category;
use App\Models\Product;
use App\Models\Popup;
use App\Models\Sale;
use App\Models\Subscriber;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Cart;

class HomeComponent extends Component
{
    protected $listeners = ['refreshComponent'=>'$refresh'];

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


    public function addSubscriber()
    {
        $subscriber = new Subscriber();
        $subscriber->email = $email;
        $subscriber->save();
        return;
    }
    
    public function render()
    {
        $sliders = HomeSlider::where('status',1)->get();
        $lproducts =  Product::orderBy('created_at','ASC')->get()->take(8);
        $category = HomeCategory::find(1);
        $cats = explode(',',$category->sel_categories);
        $categories = Category::whereIn('id',$cats)->get();
        $no_of_products = $category->no_of_products;
        $sproducts = Product::where('sale_price','>',0)->inRandomOrder()->get()->take(8);
        $sale = Sale::find(1);
        $homepageBannerFirstLeft = HomepageBannerFirstLeft::where('status', 1)->get()->first();
        $homepageBannerFirstRight = HomepageBannerFirstRight::where('status', 1)->get()->first();
        $homepageBannerSecond = HomepageBannerSecond::where('status', 1)->get()->first();
        $popups = Popup::where('status', 1)->get()->first();


         // if(Auth::check())
         // {
         //    Cart::instance('cart')->restore(Auth::user()->email);
         //    Cart::instance('wishlist')->restore(Auth::user()->email);
         // }
                 
        return view('livewire.home-component', [
            'sliders'=>$sliders, 
            'lproducts'=>$lproducts, 
            'categories'=>$categories, 
            'no_of_products'=>$no_of_products, 
            'sproducts'=>$sproducts, 
            'sale'=>$sale, 
            'homepageBannerFirstLeft'=>$homepageBannerFirstLeft, 
            'homepageBannerFirstRight'=>$homepageBannerFirstRight, 
            'homepageBannerSecond'=>$homepageBannerSecond, 
            'popups'=>$popups
        ])->layout('layouts.base');
    }
}


