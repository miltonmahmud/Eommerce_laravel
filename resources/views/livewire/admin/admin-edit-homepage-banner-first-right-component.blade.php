 <div id="content">

  @livewire('admin.admin-sidebar')
    
  <main id="main" class="main">
     <section class="section dashboard">
        <div class="row">
            <div class="col-lg-9">
                      <div class="card">
                          <div class="card-header align-middle">
                             <span class="headline">Edit Banner</span>
                             <a href="{{route('admin.homepageBannerFirstRight')}}" type="button" class="btn btn-primary float-end">All Banner</a>
                          </div>
                          <div class="card-body">
                            <form wire:submit.prevent="updateBanner">
                              <div class="mb-3">
                                  <label>Title</label>
                                       <input type="text" placeholder="Title" class="form-control input-md" wire:model="title" />
                                       @error('title') <p class="text-danger">{{$message}}</p> @enderror
                              </div>

                              <div class="mb-3">
                                  <label>Subtitle</label>
                                       <input type="text" placeholder="Subtitle" class="form-control input-md" wire:model="subtitle" />
                                       @error('subtitle') <p class="text-danger">{{$message}}</p> @enderror
                              </div>

                              <div class="mb-3">
                                  <label>Link</label>
                                       <input type="text" placeholder="Link" class="form-control input-md" wire:model="link" />
                                       @error('link') <p class="text-danger">{{$message}}</p> @enderror
                              </div>

                              <div class="mb-3">
                                  <label class="col-form-label">Image</label>
                                       <input type="file" class="input-file form-control" wire:model="newimage" />
                                       @if($newimage)
                                          <img src="{{$newimage->temporaryUrl()}}" width="120" />
                                      @else
                                          <img src="{{asset('assets/images/banners')}}/{{$image}}" width="120" />
                                       @endif
                              </div>

                              <div class="mb-3">
                                  <label>Status</label>
                                       <select class="form-control" wire:model="status">
                                          <option value="0">Inactive</option>
                                          <option value="1">Active</option>
                                      </select>
                              </div>
                              <div class="text-center mb-3 d-grid">
                                  <label></label>
                                      <button type="submit" class="btn btn-primary btn-lg btn-block">Update</button>
                              </div>
                          </form>
                          </div>
                          </div>
                      </div>
                </div>
            </div>
        </div>
     </section>
  </main>
</div>