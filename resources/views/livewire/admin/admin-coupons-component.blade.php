<div id="content">

  @livewire('admin.admin-sidebar')
    
  <main id="main" class="main">
     <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                      <div class="card">
                            <div class="card-header align-middle">
                               <span class="headline">All Coupons</span>
                               <a href="{{route('admin.addcoupon')}}" type="button" class="btn btn-primary float-end">Add New</a>
                            </div>
                          <div class="card-body my-3">
                              @if(Session::has('message'))
                                  <div class="alert alert-success" role="alert">{{Session::get('message')}}
                                  </div>
                              @endif
                              <table class="table table-bordered">
                                <thead class="table-primary">
                                    <tr>
                                        <th>Id</th>
                                        <th>Coupon Code</th>
                                        <th>Coupon Type</th>
                                        <th>Coupon Value</th>
                                        <th>Cart Value</th>
                                        <th>Expiry Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                      @foreach ($coupons as $coupon)
                                      <tr class="align-middle">
                                          <td style="font-weight: 500;">{{$coupon->id}}</td>
                                          <td>{{$coupon->code}}</td>
                                          <td>{{$coupon->type}}</td>
                                      @if($coupon->type == 'fixed')
                                          <td>${{$coupon->value}}</td>
                                      @else
                                          <td>{{$coupon->value}} %</td>
                                      @endif
                                          <td>{{$coupon->cart_value}}</td>
                                          <td>{{$coupon->expiry_date}}</td>
                                          <td>
      <a href="{{route('admin.editcoupon',['coupon_id'=>$coupon->id])}}"><i class="bx bxs-edit" style="font-size: 28px"></i></a>
  <a href="#" style="margin-left: 5px;" wire:click.prevent="deleteConfirmation({{$coupon->id}})"><i class="ri-close-circle-fill" style="font-size: 26px;"></i></a>
                                          </td>
                                      </tr>
                                      @endforeach
                                </tbody>
                           </table>
                          </div>
                      </div>
                  </div>
                </div>
        </div>
     </section>
  </main>
</div>