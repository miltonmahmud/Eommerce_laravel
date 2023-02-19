<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class AdminProductComponent extends Component
{
    use WithPagination;

    protected $listeners = ['deleteConfirmed' => 'deleteProduct'];

    public $searchTerm;
    public $product_id;


    public function deleteConfirmation($id) {
        $this->product_id = $id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function deleteProduct()
    {
        $product = Product::where('id', $this->product_id)->first();
        if($product->image)
        {
           unlink('assets/images/products'. '/' .$product->image);
        }
        
        if($product->images)
        {
           $images = explode(",",$product->images);
           foreach($images as $image)
           {
                if($image)
                {
                    unlink('assets/images/products'. '/' .$image);
                }
           }
        }
        $product->delete();
        $this->dispatchBrowserEvent('productDelete');
    }

    public function render()
    {
        // $products = Product::paginate(10);

        $search = '%' . $this->searchTerm . '%';
        $products = Product::where('name', 'LIKE',$search)
                    ->orwhere('stock_status', 'LIKE',$search)
                    ->orwhere('regular_price', 'LIKE',$search)
                    ->orwhere('sale_price', 'LIKE',$search)
                    ->orderBy('id', 'DESC')->paginate(10);

        return view('livewire.admin.admin-product-component',['products'=>$products])->layout('layouts.admin.base');
    }
}
