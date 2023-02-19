<div id="content">
  
  @livewire('user.user-sidebar')
    
  <main id="main" class="main">
     <section class="section dashboard">
        <div class="row">
            <div class="col-lg-9">
                      <div class="card" style="padding-top: 20px;">
                          <div class="card-body">
                              @if(Session::has('password_success'))
                                  <div class="alert alert-success" role="alert">{{Session::get('password_success')}}</div>
                              @endif

                              @if(Session::has('password_error'))
                                  <div class="alert alert-danger" role="alert">{{Session::get('password_error')}}</div>
                              @endif

                              <form action="" wire:submit.prevent="changePassword">
                                  <div class="mb-3">
                                      <label class="form-label">Current Password</label>
                                          <input type="password" placeholder="Current Password" class="form-control input-md" name="current_password" wire:model="current_password"/>
                                          @error('current_password') <p class="text-danger">{{$message}}</p> @enderror          
                                  </div>
                                  <div class="mb-3">
                                      <label class="form-label">New Password</label>
                                          <input type="password" placeholder="New Password" class="form-control input-md" name="password" wire:model="password" />
                                          @error('password') <p class="text-danger">{{$message}}</p> @enderror
                                  </div>
                                  <div class="mb-3">
                                      <label class="form-label">Confirm Password</label>
                                          <input type="password" placeholder="Confirm Password" class="form-control input-md" name="password_confirmation" wire:model="password_confirmation" />
                                          @error('password_confirmation') <p class="text-danger">{{$message}}</p> @enderror
                                  </div>
                                  <div class="text-center mb-3 d-grid">
                                      <label></label>
                                         <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
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