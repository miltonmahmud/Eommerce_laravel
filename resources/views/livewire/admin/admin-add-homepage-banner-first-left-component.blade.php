 <div id="content">

  @livewire('admin.admin-sidebar')
    
  <main id="main" class="main">
     <section class="section dashboard">
        <div class="row">
            <div class="col-lg-9">
                      <div class="card">
                          <div class="card-header align-middle">
                             <span class="headline">Add Banner</span>
                             <a href="{{route('admin.homepageBannerFirstLeft')}}" type="button" class="btn btn-primary float-end">All Banner</a>
                          </div>
                          <div class="card-body my-3">
                            <form action="" wire:submit.prevent="addBanner">
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
                                  <label>Image</label>
                                       <input type="file" class="input-file form-control" wire:model="image" />
                                       @if($image)
                                          <img src="{{$image->temporaryUrl()}}" width="120" />
                                       @endif
                                       @error('image') <p class="text-danger">{{$message}}</p> @enderror
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
                                      <button type="submit" class="btn btn-primary btn-block btn-lg submit">Submit</button>
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