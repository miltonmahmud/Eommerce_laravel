<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\ProductAttribute;

class AdminAttributesComponent extends Component
{

    public $Attribute_id;

    protected $listeners = ['deleteConfirmed' => 'deleteAttribute'];

    public function deleteAtt($id) {
        $this->Attribute_id = $id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function deleteAttribute()
    {
        $Attribute = ProductAttribute::where('id', $this->Attribute_id)->first();
        $Attribute->delete();
        $this->dispatchBrowserEvent('AttributeDelete');

    }

    public function render()
    {
         $pattributes = ProductAttribute::paginate(10);
        return view('livewire.admin.admin-attributes-component', ['pattributes'=>$pattributes])->layout('layouts.admin.base');
    }
}
