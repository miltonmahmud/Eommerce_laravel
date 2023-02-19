<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Coupon;

class AdminCouponsComponent extends Component
{
    public $Coupon_id;

    protected $listeners = ['deleteConfirmed' => 'deleteCoupon'];

    public function deleteConfirmation($id) {
        $this->Coupon_id = $id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function deleteCoupon()
    {
        $Coupon = Coupon::where('id', $this->Coupon_id)->first();
        $Coupon->delete();
        $this->dispatchBrowserEvent('CouponDelete');

    }

    public function render()
    {
        $coupons = Coupon::all(); 
        return view('livewire.admin.admin-coupons-component', ['coupons'=>$coupons])->layout('layouts.admin.base');
    }
}
