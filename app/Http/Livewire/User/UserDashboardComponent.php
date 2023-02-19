<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserDashboardComponent extends Component
{

    public function render()
    {
        $orders = Order::orderBy('created_at','DESC')->where('user_id', Auth::user()->id)->get()->take(10);
        $totalCost = Order::where('status','!=','canceled')->where('user_id', Auth::user()->id)->sum('total');
        $totalOrder = Order::where('user_id',Auth::user()->id)->count();
        $totalDeliverd = Order::where('status','delivered')->where('user_id', Auth::user()->id)->count();
        $totalCanceled = Order::where('status','canceled')->where('user_id', Auth::user()->id)->count();
        $user = User::find(Auth::user()->id);
        return view('livewire.user.user-dashboard-component',['orders'=>$orders, 'totalCost'=>$totalCost, 'totalOrder'=>$totalOrder ,'totalDeliverd'=>$totalDeliverd, 'totalCanceled'=>$totalCanceled, 'user'=> $user])->layout('layouts.user.base');
    }
}

 