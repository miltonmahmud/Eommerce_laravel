 <div id="content">

  @livewire('admin.admin-sidebar')
    
  <main id="main" class="main">
     <section class="section dashboard">
        <div class="row">
            <div class="col-lg-9">
                      <div class="card">
                            <div class="card-header align-middle">
                               <span class="headline">Edit Popup</span>
                               <a href="{{route('admin.Popup')}}" type="button" class="btn btn-primary float-end">All Popups</a>
                            </div>
                          <div class="card-body">
                              @if(Session::has('message'))
                                  <div class="alert alert-success" role="alert">{{Session::get('message')}}
                                  </div>
                              @endif
                              @if (count($errors) > 0)
                          <div id="ERROR_COPY" style="display: none;" class="alert alert-danger">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                      <li>{{$error}}</li>    
                                  @endforeach
                              </ul>
                          </div>
                          @endif
                          <form action="" wire:submit.prevent="updatePopup">
                              <div class="mb-3">
                                  <label class="form-label">Title</label>
                                       <input type="text" placeholder="Title" class="form-control input-md" wire:model="title" />
                              </div>

                              <div class="mb-3">
                                  <label class="form-label">Subtitle</label>
                                       <input type="text" placeholder="Subtitle" class="form-control input-md" wire:model="subtitle" />
                              </div>

                              <div class="mb-3">
                                  <label class="form-label">Image</label>
                                       <input type="file" class="input-file" wire:model="newimage" />
                                       @if($newimage)
                                          <img src="{{$newimage->temporaryUrl()}}" width="120" />
                                      @else
                                          <img src="{{asset('assets/images/banners')}}/{{$image}}" width="120" />
                                       @endif
                              </div>

                              <div class="mb-3">
                                  <label class="form-label">Status</label>
                                       <select class="form-control" wire:model="status">
                                          <option value="0">Inactive</option>
                                          <option value="1">Active</option>
                                      </select>
                              </div>
                              <div class="text-center mb-3 d-grid">
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