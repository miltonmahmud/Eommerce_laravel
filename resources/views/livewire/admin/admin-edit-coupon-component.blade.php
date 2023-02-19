@push('css')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endpush

<div id="content">

  @livewire('admin.admin-sidebar')    
    
  <main id="main" class="main">
     <section class="section dashboard">
        <div class="row">
            <div class="col-lg-9">
                      <div class="card">
                            <div class="card-header align-middle">
                               <span class="headline">Edit Coupon</span>
                               <a href="{{route('admin.coupons')}}" type="button" class="btn btn-primary float-end">All Coupons</a>
                            </div>
                          <div class="card-body my-3">
                              @if(Session::has('message'))
                                  <div class="alert alert-success" role="alert">{{Session::get('message')}}
                                  </div>
                              @endif
                              <form wire:submit.prevent="updateCoupon">
                              <div class="mb-3">
                                  <label>Coupon Code</label>
                                      <input type="text" placeholder="Coupon Code" class="form-control input-md" wire:model="code" />
                                      @error('code') <p class="text-danger">{{$message}}</p> @enderror
                              </div>
                              <div class="mb-3">
                                  <label class="form-label">Coupon Type</label>
                                      <select class="form-control" wire:model="type">
                                          <option value="">Select</option>
                                          <option value="fixed">Fixed</option>
                                          <option value="percent">Percent</option>
                                      </select>
                                      @error('type') <p class="text-danger">{{$message}}</p> @enderror
                              </div>
                              <div class="mb-3">
                                  <label class="form-label">Coupon Value</label>
                                      <input type="text" placeholder="Coupon Value" class="form-control input-md" wire:model="value"/>
                                      @error('value') <p class="text-danger">{{$message}}</p> @enderror
                              </div>
                              <div class="mb-3">
                                  <label class="form-label">Cart Value</label>
                                      <input type="text" placeholder="Cart Value" class="form-control input-md" wire:model="cart_value"/>
                                      @error('cart_value') <p class="text-danger">{{$message}}</p> @enderror
                              </div>
                              <div class="mb-3">
                                  <label class="form-label">Expiry Date</label>
                                  <div wire:ignore>
                                      <input type="text" id="expiry_date" placeholder="Expiry Date" class="form-control input-md" wire:model="expiry_date"/>
                                      @error('expiry_date') <p class="text-danger">{{$message}}</p> @enderror
                                  </div>
                              </div>
                              <div class="text-center d-grid">
                                  <label></label>
                                  <button type="submit" class="btn btn-primary btn-block btn-lg">Update</button>
                          </div>
                          </form>
                          </div>
                      </div>
                </div>
            </div>
        </div>
     </section>
  </main>
</div>

@push('scripts')

  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

  <script>
      flatpickr("#expiry_date", {
        enableTime: false,
    dateFormat: "Y-m-d H:i",
      });
  </script>

@endpush
