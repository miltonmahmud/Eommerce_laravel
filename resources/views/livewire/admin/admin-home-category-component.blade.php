 
<div id="content">
  
  @livewire('admin.admin-sidebar')
    
  <main id="main" class="main">
     <section class="section dashboard">
        <div class="row">
            <div class="col-lg-9">
                      <div class="card">
                            <div class="card-header align-middle">
                               <span class="headline">Home Categories</span>
                            </div>
                          <div class="card-body">
                              @if(Session::has('message'))
                                  <div class="alert alert-success" role="alert">{{Session::get('message')}}
                                  </div>
                              @endif
                              <form wire:submit.prevent="updateHomeCategory">
                               <div class="mb-3">
                                   <label class="form-label">Choose Categories</label>
                                   <div wire:ignore>
                                      <select class="sel_categories form-control" name="categories[]" multiple="multiple" wire:model="selected_categories">
                                          @foreach($categories as $category)
                                              <option value="{{$category->id}}">{{$category->name}}</option>
                                          @endforeach
                                      </select>
                                  </div>
                               </div>

                               <div class="mb-3">
                                   <label class="form-label">No of Products</label>
                                      <input type="text" class="form-control input-md" wire:model="numberofproducts" />
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



@push('scripts')

    <script>
        $(document).ready(function(){
            $('.sel_categories').select2();
            $('.sel_categories').on('change', function(e){
               var data = $('.sel_categories').select2("val");
               @this.set('selected_categories', data);
            });
        });
    </script>

@endpush