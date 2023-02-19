<div id="content">

  @livewire('admin.admin-sidebar')
    
  <main id="main" class="main">
     <section class="section dashboard">
        <div class="row">
            <div class="col-lg-9">
                      <div class="card">
                            <div class="card-header align-middle">
                               <span class="headline">All Settings</span>
                            </div>
                          <div class="card-body">
                              @if(Session::has('message'))
                                  <div class="alert alert-success" role="alert">{{Session::get('message')}}
                                  </div>
                              @endif
                              <form wire:submit.prevent="saveSettings">
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                        <input type="email" placeholder="Email" class="form-control input-md" wire:model="email" />
                                        @error('email') 
                                          <p class="text-danger">{{$message}}</p> 
                                        @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Phone</label>
                                        <input type="text" placeholder="Phone" class="form-control input-md" wire:model="phone" />
                                        @error('phone') 
                                          <p class="text-danger">{{$message}}</p> 
                                        @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Phone2</label>
                                        <input type="text" placeholder="Phone2" class="form-control input-md" wire:model="phone2" />
                                        @error('phone2') 
                                          <p class="text-danger">{{$message}}</p> 
                                        @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Address</label>
                                        <input type="text" placeholder="Address" class="form-control input-md" wire:model="address" />
                                        @error('address') 
                                          <p class="text-danger">{{$message}}</p> 
                                        @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Map</label>
                                        <input type="text" placeholder="Map" class="form-control input-md" wire:model="map" />
                                        @error('map') 
                                          <p class="text-danger">{{$message}}</p> 
                                        @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Twiter</label>
                                        <input type="text" placeholder="Twiter" class="form-control input-md" wire:model="twiter" />
                                        @error('twiter') 
                                          <p class="text-danger">{{$message}}</p> 
                                        @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Facebook</label>
                                        <input type="text" placeholder="Facebook" class="form-control input-md" wire:model="facebook" />
                                        @error('facebook') 
                                          <p class="text-danger">{{$message}}</p> 
                                        @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Pinterest</label>
                                        <input type="text" placeholder="Pinterest" class="form-control input-md" wire:model="pinterest" />
                                        @error('pinterest') 
                                          <p class="text-danger">{{$message}}</p> 
                                        @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Instagram</label>
                                        <input type="text" placeholder="Instagram" class="form-control input-md" wire:model="instagram" />
                                        @error('instagram') 
                                          <p class="text-danger">{{$message}}</p> 
                                        @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Youtube</label>
                                        <input type="text" placeholder="Youtube" class="form-control input-md" wire:model="youtube" />
                                        @error('youtube') 
                                          <p class="text-danger">{{$message}}</p> 
                                        @enderror
                                </div>
                                <div class="mb-3 d-grid">
                                    <label></label>
                                    <button type="submit" class="btn btn-primary btn-block btn-lg">Submit</button>
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
