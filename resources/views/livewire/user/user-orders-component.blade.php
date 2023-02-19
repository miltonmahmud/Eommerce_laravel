 <div id="content">

  @livewire('user.user-sidebar')
    
  <main id="main" class="main">
     <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                      <div class="card">
                          <div class="card-body">
                              @if(Session::has('order_message'))
                                  <div class="alert alert-success" role="alert">{{Session::get('order_message')}}</div>
                              @endif
                              <table class="table table-bordered"  style="margin-top: 20px;">
                                <thead>
                                    <tr>
                                        <th>OrderId</th>
                                        <th>Subtotal</th>
                                        <th>Discount</th>
                                        <th>Tax</th>
                                        <th>Total</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Order Date</th> 
                                        <th>Action</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                      <tr class="align-middle" style="font-size: 15px;">
                                          <td>{{$order->id}}</td>
                                          <td>${{$order->subtotal}}</td>
                                          <td>${{$order->discount}}</td>
                                          <td>${{$order->tax}}</td>
                                          <td>${{$order->total}}</td>
                                          <td>{{$order->email}}</td>
                                          <td>{{$order->status}}</td>
                                          <td>{{$order->created_at}}</td>
                                          <td><a href="{{route('user.orderdetails',['order_id'=>$order->id])}}" class="btn btn-info btn-md" style="color: #fff;">Details</td>
                                      </tr>
                                  @endforeach
                                </tbody>
                            </table>
                            {{$orders->links()}}
                 
                </div>
            </div>
        </div>
     </section>
  </main>
</div>
