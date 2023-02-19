 <div id="content">

  @livewire('user.user-sidebar')
    
  <main id="main" class="main">
     <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                   <div class="card-header align-middle">
                     <h5 class="fw-bold" style="display: inline-block; margin-top: 8px; color: #333 !important;">Order Details</h5>
                     <span><a href="{{route('user.orders')}}" type="button" class="btn btn-primary btn-md float-end" style="color: #fff;">All Orders</a></span>
                  </div>
                  <div class="card-body mt-3">
                     <table class="table table-bordered text-center">
                         <thead class="table-primary">
                            <tr>
                               <th>Order Id</th>
                               <th>Order Date</th>
                               <th>Status</th>
                                  @if($order->status == "delivered")
                                    <th>Delivery Date</th>
                                  @elseif($order->status == "canceled")
                                    <th>Cancellation Date</th>
                                  @endif
                            </tr>
                         </thead>
                         <tbody>
                            <tr>
                               <td>{{$order->id}}</td>
                               <td>{{$order->created_at}}</td>
                               <td style="text-transform: capitalize;">
                                  {{$order->status}}
                               </td>
                                  @if($order->status == "delivered")
                                    <td>{{$order->delivered_date}}</td>
                                  @elseif($order->status == "canceled")
                                    <td>{{$order->canceled_date}}</td>
                                  @endif
                            </tr>
                         </tbody>
                     </table>
                  </div>
                </div>
                <div class="card">
                   <div class="card-header align-middle">
                     <h5 class="fw-bold mb-0">Ordered Items</h5>
                  </div>
                  <div class="card-body mt-3">
                     <table class="table table-bordered text-center">
                        <thead class="table-primary">
                           <tr>
                              <th>Image</th>
                              <th>Product Name</th>
                              <th>Attribute</th>
                              <th>Unit Price</th>
                              <th>Quantity</th>
                              <th>Subtotal</th>
                           </tr>
                        </thead>
                        <tbody>
                          @foreach($order->orderItems as $item)
                           <tr class="align-middle">
                              <td><img src="{{ asset('assets/images/products') }}/{{$item->product->image}}" alt="{{$item->product->name}}" width="60px"></td>
                              <td>{{$item->product->name}}</td>
                              @if($item->options)
                                 <td>
                                     @foreach(unserialize($item->options) as $key => $value)
                                          <p><b>{{$key}} : {{$value}}</b></p>
                                     @endforeach
                                 </td>
                              @endif
                              <td>{{$item->price}}</td>
                              <td>{{$item->quantity}}</td>
                              <td>${{ number_format($item->price * $item->quantity, 2) }}</td>
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                     <h5 class="fw-bold mb-0">Order Summery</h5>
                     <hr>
                     <table class="table">
                        <tbody>
                           <tr>
                              <td>Subtotal</td>
                              <td class="text-end">${{$order->subtotal}}</td>
                           </tr>
                           <tr>
                              <td>Tax</td>
                              <td class="text-end">${{$order->tax}}</td>
                           </tr>
                           <tr>
                              <td>Shipping</td>
                              <td class="text-end">Free Shipping</td>
                           </tr>
                           <tr>
                              <td class="fw-bold">Total</td>
                              <td class="text-end fw-bold">${{$order->total}}</td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
                </div>
                <div class="card">
                   <div class="card-header align-middle">
                      <h5 class="fw-bold mb-0">Billing Details</h5>
                   </div>
                   <div class="card-body mt-3">
                      <table class="table table-bordered">
                         <tbody>
                            <tr>
                               <td class="fw-bold">First Name</td>
                               <td>{{$order->firstname}}</td>
                               <td class="fw-bold">Last Name</td>
                               <td>{{$order->lastname}}</td>
                            </tr>
                            <tr>
                               <td class="fw-bold">Phone</td>
                               <td>{{$order->mobile}}</td>
                               <td class="fw-bold">Email</td>
                               <td>{{$order->email}}</td>
                            </tr>
                            <tr>
                               <td class="fw-bold">Line1</td>
                               <td>{{$order->line1}}</td>
                               <td class="fw-bold">Line2</td>
                               <td>{{$order->line2}}</td>
                            </tr>
                            <tr>
                               <td class="fw-bold">City</td>
                               <td>{{$order->city}}</td>
                               <td class="fw-bold">Province</td>
                               <td>{{$order->province}}</td>
                            </tr>
                            <tr>
                               <td class="fw-bold">Country</td>
                               <td>{{$order->country}}</td>
                               <td class="fw-bold">Zipcode</td>
                               <td>{{$order->zipcode}}</td>
                            </tr>
                         </tbody>
                      </table>
                   </div>
                </div>

                @if($order->is_shipping_different)
                <div class="card">
                   <div class="card-header align-middle">
                      <h5 class="fw-bold mb-0">Shipping Details</h5>
                   </div>
                   <div class="card-body mt-3">
                      <table class="table table-bordered">
                         <tbody>
                            <tr>
                               <td class="fw-bold">First Name</td>
                               <td>{{$order->shipping->firstname}}</td>
                               <td class="fw-bold">Last Name</td>
                               <td>{{$order->shipping->lastname}}</td>
                            </tr>
                            <tr>
                               <td class="fw-bold">Phone</td>
                               <td>{{$order->shipping->mobile}}</td>
                               <td class="fw-bold">Email</td>
                               <td>{{$order->shipping->email}}</td>
                            </tr>
                            <tr>
                               <td class="fw-bold">Line1</td>
                               <td>{{$order->shipping->line1}}</td>
                               <td class="fw-bold">Line2</td>
                               <td>{{$order->shipping->line2}}</td>
                            </tr>
                            <tr>
                               <td class="fw-bold">City</td>
                               <td>{{$order->shipping->city}}</td>
                               <td class="fw-bold">Province</td>
                               <td>{{$order->shipping->province}}</td>
                            </tr>
                            <tr>
                               <td class="fw-bold">Country</td>
                               <td>{{$order->shipping->country}}</td>
                               <td class="fw-bold">Zipcode</td>
                               <td>{{$order->shipping->zipcode}}</td>
                            </tr>
                         </tbody>
                      </table>
                   </div>
                </div>
                @endif

                <div class="card">
                   <div class="card-header">
                      <h5 class="fw-bold mb-0">Transaction</h5>
                   </div>
                   <div class="card-body mt-3">
                   <table class="table table-bordered">
                      <tbody>
                         <tr>
                            <td class="fw-bold">Transaction Mode</td>
                            <td>{{$order->transaction->mode}}</td>
                         </tr>
                         <tr>
                            <td class="fw-bold">Status</td>
                            <td>{{$order->transaction->status}}</td>
                         </tr>
                         <tr>
                            <td class="fw-bold">Transaction Date</td>
                            <td>{{$order->transaction->created_at}}</td>
                         </tr>
                      </tbody>
                   </table>
                </div>
                </div>
            </div>
        </div>
     </section>
  </main>
</div>
