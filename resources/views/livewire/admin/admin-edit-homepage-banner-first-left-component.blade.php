 <div id="content">

  @livewire('admin.admin-sidebar')
    
  <main id="main" class="main">
     <section class="section dashboard">
        <div class="row">
            <div class="col-lg-9">
                      <div class="card">
                          <div class="card-header align-middle">
                             <span class="headline">Edit Banner</span>
                             <a href="{{route('admin.homepageBannerFirstLeft')}}" type="button" class="btn btn-primary float-end">All Banner</a>
                          </div>
                          <div class="card-body my-3">
                            <form wire:submit.prevent="updateBanner">
                              <div class="mb-3">
                                  <label class="form-label">Title</label>
                                       <input type="text" placeholder="Title" class="form-control input-md" wire:model="title" />
                                       @error('title') <p class="text-danger">{{$message}}</p> @enderror
                              </div>

                              <div class="mb-3">
                                  <label class="form-label">Subtitle</label>
                                       <input type="text" placeholder="Subtitle" class="form-control input-md" wire:model="subtitle" />
                                       @error('subtitle') <p class="text-danger">{{$message}}</p> @enderror
                              </div>

                              <div class="mb-3">
                                  <label class="form-label">Link</label>
                                       <input type="text" placeholder="Link" class="form-control input-md" wire:model="link" />
                                       @error('link') <p class="text-danger">{{$message}}</p> @enderror
                              </div>

                              <div class="mb-3">
                                  <label class="col-form-label">Image</label>
                                       <input type="file" class="form-control input-md" wire:model="newimage" />
                                       @if($newimage)
                                          <img src="{{$newimage->temporaryUrl()}}" width="120" style="margin-top: 10px;" />
                                      @else
                                          <img src="{{asset('assets/images/banners')}}/{{$image}}" width="120" style="margin-top: 10px;" />
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
                                  <label class="form-label"></label>
                                  <button type="submit" class="btn btn-primary btn-block btn-lg">Update</button>
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