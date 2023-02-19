<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;
use App\Models\Subcategory;

class AdminCategoryComponent extends Component
{
    use WithPagination;

    public $category_id;
    public $subcategory_id;

    protected $listeners = ['deleteConfirmed' => 'deletenow'];

    public function deleteCategory($id)
    {
        $this->category_id = $id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function deletenow()
    {
        $category = Category::where('id', $this->category_id)->first();
        $category->delete();
        $this->dispatchBrowserEvent('categoryDelete');

    }

     public function deleteSubcategory($id)
     {
        $this->subcategory_id = $id;
        $this->dispatchBrowserEvent('show-sdelete-confirmation');
     } 

     public function scategoryDelete()
    {
        $category = Subcategory::where('id', $this->subcategory_id)->first();
        $category->delete();
        $this->dispatchBrowserEvent('scategoryDelete');

    }

    public function render()
    {
        $categories = Category::paginate(10); 
        return view('livewire.admin.admin-category-component',['categories'=>$categories])->layout('layouts.admin.base');
    }
}
