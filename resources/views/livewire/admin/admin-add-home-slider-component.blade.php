<div id="content">

  @livewire('admin.admin-sidebar')
    
  <main id="main" class="main">
     <section class="section dashboard">
        <div class="row">
            <div class="col-lg-9">
                      <div class="card">
                            <div class="card-header align-middle">
                               <span class="headline">Add New Slider</span>
                               <a href="{{route('admin.homeslider')}}" type="button" class="btn btn-primary float-end">All Sliders</a>
                            </div>
                          <div class="card-body">
                              @if(Session::has('message'))
                                  <div class="alert alert-success" role="alert">{{Session::get('message')}}
                                  </div>
                              @endif
                              <form action="" wire:submit.prevent="addSlide">
                              <div class="mb-3">
                                  <label class="form-label">Title</label>
                                       <input type="text" placeholder="Title" class="form-control input-md" wire:model="title" name="title" />
                                       @error('title') <p class="text-danger">{{$message}}</p> @enderror
                              </div>

                              <div class="mb-3">
                                  <label class="form-label">Subtitle</label>
                                       <input type="text" placeholder="Subtitle" class="form-control input-md" wire:model="subtitle" name="subtitle" />
                                       @error('subtitle') <p class="text-danger">{{$message}}</p> @enderror
                              </div>

                              <div class="mb-3">
                                  <label class="form-label">Price</label>
                                       <input type="text" placeholder="Price" class="form-control input-md" wire:model="price" />
                              </div>

                              <div class="mb-3">
                                  <label class="form-label">Link</label>
                                       <input type="text" placeholder="Link" class="form-control input-md" wire:model="link" />
                              </div>

                              <div class="mb-3">
                                  <label class="form-label">Image</label>
                                       <input type="file" class="input-file form-control" wire:model="image" name="image" />
                                       @if($image)
                                          <img src="{{$image->temporaryUrl()}}" width="120" />
                                       @endif
                                       @error('image') <p class="text-danger">{{$message}}</p> @enderror
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
