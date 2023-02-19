<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class HeaderSearchComponent extends Component
{
    public $search;                 

    public function render()
    {
        $categories = Category::all();
        return view('livewire.header-search-component',['categories'=>$categories]);
    }
}
