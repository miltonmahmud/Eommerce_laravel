<div id="content">
  
  @livewire('admin.admin-sidebar')
    
  <main id="main" class="main">
     <section class="section dashboard">
        <div class="row">
            <div class="col-lg-9">
                      <div class="card">
                            <div class="card-header align-middle">
                               <span class="headline">Add New Attribute</span>
                               <a href="{{route('admin.attributes')}}" type="button" class="btn btn-primary float-end">All Attributes</a>
                            </div>
                          <div class="card-body">
                              @if(Session::has('message'))
                                  <div class="alert alert-success" role="alert">{{Session::get('message')}}
                                  </div>
                              @endif
                              <form wire:submit.prevent="storeAttribute">
                              <div class="mb-3">
                                  <label class="mb-3">Attribute Name</label>
                                      <input type="text" placeholder="Attribute Name" class="form-control input-md" wire:model="name" />
                                      @error('name') <p class="text-danger">{{$message}}</p> @enderror
                              </div>
                              <div class="text-center mb-3 d-grid">
                                  <label></label>
                                  <button type="submit" class="btn btn-primary  btn-block btn-lg">Submit</button>
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