<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use App\Exports\OrderExport;
use Livewire\WithPagination;
use Excel;
use Livewire\Component;

class AdminOrderComponent extends Component
{
    use WithPagination;

    public function exportIntoExcel() {
        return Excel::download(new OrderExport, 'Order_List.xlsx');
    }

    public function updateOrderStatus($order_id,$status)
    {
        $order = Order::find($order_id);
        $order->status = $status;

        if($status == "delivered")
        {
           $order->delivered_date = DB::raw('CURRENT_DATE');
        }
        else if($status == "canceled")
        {
                         
           $order->canceled_date = DB::raw('CURRENT_DATE');
        }

        $order->save();
        $this->dispatchBrowserEvent('updateOrder');
        return redirect()->back();
    }

    public function render()
    {
        $orders = Order::orderBy('created_at', 'DESC');
        return view('livewire.admin.admin-order-component', ['orders'=>Order::paginate(10)])->layout('layouts.admin.base');
    }
}
