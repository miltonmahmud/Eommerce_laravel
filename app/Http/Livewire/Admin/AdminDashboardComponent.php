<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;
use App\Models\Subscriber;
use App\Models\User;
use Livewire\WithPagination;
use Carbon\Carbon;

class AdminDashboardComponent extends Component
{
    use WithPagination;
    
    public function render()
    {
        $orders = Order::orderBy('created_at', 'DESC')->get()->take(10);
        $totalOrders = Order::all()->count();
        $totalUser = User::where('utype', 'USR')->count();
        $totalSubscriber = Subscriber::all()->count();
        $totalSales = Order::where('status','delivered')->count();
        $tRevenue = Order::where('status', 'delivered')->sum('total');
        $totalRevenue = number_format($tRevenue);;
        $todaySales = Order::where('status', 'delivered')->whereDate('created_at',Carbon::today())->count();
        $tdRevenue = Order::where('status','delivered')->whereDate('created_at', Carbon::today())->sum('total');
        $todayRevenue = number_format($tdRevenue);
        return view('livewire.admin.admin-dashboard-component',[
            'orders'=>$orders,
            'totalSales'=>$totalSales,
            'totalRevenue'=>$totalRevenue,
            'todaySales' => $todaySales,
            'todayRevenue' => $todayRevenue,
            'totalOrders' => $totalOrders,
            'totalSubscriber' => $totalSubscriber,
            'totalUser' => $totalUser
            ])->layout('layouts.admin.base');
    }
                 
}
