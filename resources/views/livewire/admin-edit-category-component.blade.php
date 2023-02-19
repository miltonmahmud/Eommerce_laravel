<div id="content">

  @livewire('admin.admin-sidebar')    
    
  <main id="main" class="main">
     <section class="section dashboard">
        <div class="row">
            <div class="col-lg-9">
                      <div class="card">
                            <div class="card-header align-middle">
                               <span class="headline">Edit Category</span>
                               <a href="{{route('admin.categories')}}" type="button" class="btn btn-primary float-end">All Categories</a>
                            </div>
                          <div class="card-body my-3">
                              @if(Session::has('message'))
                                  <div class="alert alert-success" role="alert">{{Session::get('message')}}
                                  </div>
                              @endif
                              <form wire:submit.prevent="updateCategory">
                              <div class="mb-3">
                                  <label class="form-label">Category Name</label>
                                      <input type="text" placeholder="Category Name" class="form-control input-md" wire:model="name" wire:keyup="generateslug" />
                                       @error('name')
                                          <p class="text-danger">{{$message}}</p> 
                                       @enderror
                              </div>
                              <div class="mb-3">
                                  <label class="form-label">Category Slug</label>
                                      <input type="text" placeholder="Category Slug" class="form-control input-md" wire:model="slug"/>
                                      @error('slug')
                                          <p class="text-danger">{{$message}}</p> 
                                       @enderror
                              </div>
                              <div class="mb-3">
                                  <label class="form-label">Parent Category</label>
                                       <select class="form-control" wire:model="category_id">
                                          <option value="">None</option>
                                          @foreach($categories as $category)
                                              <option value="{{$category->id}}">{{$category->name}}</option>
                                          @endforeach
                                      </select>
                                      @error('slug')
                                          <p class="text-danger">{{$message}}</p> 
                                      @enderror
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
