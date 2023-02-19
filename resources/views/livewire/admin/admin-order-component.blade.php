 <div id="content">

  <style>
    .dropdown-menu .dropdown-item:hover {
        background-color: #00af90;
        color: #fff;
        font-weight: 500;
    }
  </style>

  @livewire('admin.admin-sidebar')
    
  <main id="main" class="main">
     <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                      <div class="card">
                            <div class="card-header align-middle">
                               <span class="headline">All Orders</span>
                               <a href="#" type="button" class="btn btn-md float-end btn-danger" wire:click="exportIntoExcel()" >Export All</a>
                            </div>
                          <div class="card-body">
                              @if(Session::has('order_message'))
                                  <div class="alert alert-success" role="alert">{{Session::get('order_message')}}</div>
                              @endif
                              <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>OrderId</th>
                                        <th>Subtotal</th>
                                        <th>Discount</th>
                                        <th>Tax</th>
                                        <th>Total</th>
                                        <th>Mobile</th>
                                        {{-- <th>Email</th> --}}
                                        <th>Status</th>
                                        <th>Order Date</th> 
                                        <th colspan="2" class="text-center">Action</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                      <tr class="align-middle" style="font-size: 15px;">
                                          <td style="font-weight: 500;">#{{$order->id}}</td>
                                          <td>${{$order->subtotal}}</td>
                                          <td style="color: green;">${{$order->discount}}</td>
                                          <td>${{$order->tax}}</td>
                                          <td style="color: red; font-weight: 600;">${{$order->total}}</td>
                                          <td>{{$order->mobile}}</td>
                                          {{-- <td>{{$order->email}}</td> --}}
                                            @if($order->status == "delivered")
                                              <td>Delivered</td>
                                            @elseif($order->status == "canceled")
                                              <td>Cancelled</td>
                                            @else
                                            <td>Ordered</td>
                                            @endif

                                          <td>{{$order->created_at}}</td>
                                          <td class="text-center"><a href="{{route('admin.orderdetails',['order_id'=>$order->id])}}" class="btn btn-info btn-md" style="color: #fff;">Details</td>
                                          <td class="text-center">
                                              <div class="dropdown" style="padding-right:5px;">
                                                  <button class="btn btn-md btn-primary dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">Status
                                                      <span class="caret"></span></button>
                                                      <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                          <li><button type="button" class="btn btn-md dropdown-item" wire:click.prevent="updateOrderStatus({{$order->id}},'delivered')">Delivered</button></li>
                                                          <li><button type="button" class="btn dropdown-item btn-md" wire:click.prevent="updateOrderStatus({{$order->id}},'canceled')">Canceled</button></li>
                                                      </ul>
                                              </div>
                                          </td>
                                      </tr>
                                  @endforeach
                                </tbody>
                            </table>
                      </div>
                  {{$orders->links()}}
                 
                </div>
            </div>
        </div>
     </section>
  </main>
</div>
