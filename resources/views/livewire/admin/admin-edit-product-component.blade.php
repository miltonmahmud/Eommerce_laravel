@push('css')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endpush

<div id="content">

  @livewire('admin.admin-sidebar')
    
  <main id="main" class="main">
     <section class="section dashboard">
        <div class="row">
            <div class="col-lg-9">
                      <div class="card">
                            <div class="card-header align-middle">
                               <span class="headline">Edit Product</span>
                               <a href="{{route('admin.products')}}" type="button" class="btn btn-primary float-end">All Products</a>
                            </div>
                          <div class="card-body">
                              @if(Session::has('message'))
                                  <div class="alert alert-success" role="alert">{{Session::get('message')}}
                                  </div>
                              @endif
                              <form enctype="multipart/form-data" wire:submit.prevent="updateProduct">
                                   <div class="mb-3">
                                       <label class="form-label">Product Name</label>
                                        <input type="text" placeholder="Product Name" class="form-control input-md" wire:model="name" wire:keyup="generateSlug" />
                                        @error('name') <p class="text-danger">{{$message}}</p> @enderror
                                   </div>
                                   <div class="mb-3">
                                       <label class="form-label">Product Slug</label>
                                        <input type="text" placeholder="Product Slug" class="form-control input-md" wire:model="slug" />
                                        @error('slug') <p class="text-danger">{{$message}}</p> @enderror
                                   </div>
                                   <div class="mb-3">
                                       <label class="form-label">Short Description</label>
                                       <div style="margin-bottom: 15px;" wire:ignore>
                                          <textarea class="form-control" name="" id="short_description" placeholder="Short Description" wire:model="short_description" style="width: 100%; height: 100px; visibility: visible !important;" ></textarea>
                                          @error('short_description') <p class="text-danger">{{$message}}</p> @enderror
                                   </div>
                                   <div class="mb-3">
                                       <label class="form-label">Product Description</label>
                                       <div style="margin-bottom: 15px;" wire:ignore>
                                          <textarea class="form-control" name="" id="description" cols="30" rows="10" placeholder="Description" wire:model="description"></textarea>
                                           @error('description') <p class="text-danger">{{$message}}</p> @enderror
                                   </div>
                                   <div class="row">
                                      <div class="col-lg-6">
                                         <div class="mb-3">
                                       <label class="form-label">Regular Price</label>

                                       <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span><input id="regular_price" name="regular_price" placeholder="Regular Price" class="form-control" type="text" wire:model="regular_price"></div>
                                            @error('regular_price') <p class="text-danger">{{$message}}</p> @enderror
                                   </div>
                                 </div>
                                   <div class="col-lg-6">
                                     <div class="mb-3">
                                       <label class="form-label">Sale Price</label>
                                        <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span><input id="sale_price" name="sale_price" placeholder="Sale Price" class="form-control" type="text" wire:model="sale_price"></div>
                                        @error('sale_price') <p class="text-danger">{{$message}}</p> @enderror
                                      </div>
                                   </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Stock</label>
                                            <select class="form-control" name="" id="" wire:model="Stock_status">
                                                <option value="instock">InStock</option>
                                                <option value="outofstock">Out of Stock</option>
                                            </select>
                                            @error('Stock_status') <p class="text-danger">{{$message}}</p> @enderror
                                        </div>
                                     </div>
                                     <div class="col-lg-6">
                                       <div class="mb-3">
                                            <label class="form-label">Featured</label>
                                            <select class="form-control" name="" id="" wire:model="Featured">
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                        </div>
                                     </div>
                                   </div>
                                      
                                   <div class="row">
                                       <div class="col-lg-6">
                                           <div class="mb-3">
                                               <label class="form-label">SKU</label>
                                               <input type="text" placeholder="SKU" class="form-control input-md" wire:model="SKU" />
                                               @error('SKU') <p class="text-danger">{{$message}}</p> @enderror
                                          </div>
                                       </div>
                                       <div class="col-lg-6">
                                         <div class="mb-3">
                                             <label class="form-label">Quantity</label>
                                             <input type="text" placeholder="Quantity" class="form-control input-md" wire:model="quantity" />
                                             @error('quantity') <p class="text-danger">{{$message}}</p> @enderror
                                         </div>
                                       </div>
                                   </div>
                                   <div class="row">
                                       <div class="col-lg-6">
                                           <div class="mb-3">
                                           <label class="form-label">Product Image</label>
                                            <input type="file" class="input-file form-control" wire:model="newimage" />
                                            @if($newimage)
                                              <img src="{{$newimage->temporaryUrl()}}" width="60" />
                                            @else
                                              <img src="{{asset('assets/images/products')}}/{{$image}}" width="60" />
                                            @endif
                                            @error('newimage') <p class="text-danger">{{$message}}</p> @enderror
                                         </div>
                                       </div>
                                       <div class="col-lg-6">
                                           <div class="mb-3">
                                       <label class="form-label">Product Gallery</label>
                                            <input type="file" class="input-file form-control" wire:model="newimages" multiple />
                                            @if($newimages)
                                              @foreach($newimages as $newimage)
                                                  @if($newimage)
                                                      <img src="{{$newimage->temporaryUrl()}}" width="60" />
                                                  @endif
                                              @endforeach
                                            @else
                                              @foreach($images as $image)
                                                  @if($image)
                                                      <img src="{{asset('assets/images/products')}}/{{$image}}" alt="" width="60">
                                                  @endif
                                              @endforeach
                                            @endif
                                   </div>
                                       </div>
                                   </div>
                                   <div class="row">
                                       <div class="col-lg-6">
                                         <div class="mb-3">
                                            <label class="form-label">Category</label>
                                            <select class="form-control" wire:model="category_id" wire:change="changeSubcategory">
                                              <option value="">Select Category</option>
                                                @foreach ($categories as $category)
                                                  <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id') <p class="text-danger">{{$message}}</p> @enderror
                                          </div>
                                       </div>
                                       <div class="col-lg-6">
                                         <div class="mb-3">
                                            <label class="form-label">Sub Category</label>
                                            <select class="form-control" name="" id="" wire:model="scategory_id">
                                              <option value="0">Select Category</option>
                                                @foreach ($scategories as $scategory)
                                                  <option value="{{$scategory->id}}">{{$scategory->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('scategory_id') <p class="text-danger">{{$message}}</p> @enderror
                                         </div>
                                       </div>
                                   </div>
                                   <div class="mb-3">
                                       <div><label class="form-label">Product Attributes</label></div>
                                        <div class="col-lg-6" style="padding-left: 0; padding-bottom: 15px;">
                                          <select class="form-control" name="" id="" wire:model="attr">
                                              <option value="0">Select Attribute</option>
                                              @foreach ($pattributes as $pattribute)
                                                <option value="{{$pattribute->id}}">{{$pattribute->name}}</option>
                                              @endforeach
                                          </select>
                                            </div>
                                           <div class="col-lg-6">
                                             <button type="button" class="btn btn-info btn-md" wire:click.prevent="add">Add Attribute</button>
                                           </div>
                                   </div>

                                    @foreach($inputs as $key => $value)
                                      <div class="mb-3" style="margin-top: 15px;">
                                          <div>
                                            <label style="color: #fff;" class="form-label">{{$pattributes->where('id',$attribute_arr[$key])->first()->name}}</label>
                                          </div>
                                          <div class="col-lg-6" style="padding-left: 0; padding-bottom: 15px;">
                                              <input type="text" placeholder="{{$pattributes->where('id',$attribute_arr[$key])->first()->name}}" class="form-control" wire:model="attribute_values.{{$value}}" />
                                          </div>
                                          <div class="col-lg-6">
                                              <button type="button" class="btn btn-danger btn-md" wire:click.prevent="remove({{$key}})">Remove</button>
                                          </div>
                                      </div>
                                    @endforeach
                                   <div class="row">
                                       <div class="col-lg-12">
                                         <div class=" text-center d-grid">
                                            <button type="submit" class="btn btn-primary btn-block btn-lg">Update</button>
                                       </div>
                                   </div>
                              </form>
                          </div>
                      </div>
                </div>
            </div>
     </section>
  </main>
</div>



@push('scripts')

    <script src="https://cdn.tiny.cloud/1/4kwhiuae9ur1blfbr6mga6srqo0b4t2v0ag6no06ajzjvira/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        $(function(){

            

            tinymce.init({
              forced_root_block : '',
                selector: '#short_description',
                setup:function(editor){
                    editor.on('Change', function(e){
                        tinyMCE.triggerSave();
                        var sd_data = $('#short_description').val();
                        @this.set('short_description', sd_data);
                    });
                }
            });
            tinymce.init({
              forced_root_block : '',
                selector: '#description',
                setup:function(editor){
                   editor.on('Change', function(e){
                        tinyMCE.triggerSave();
                        var d_data = $('#description').val();
                        @this.set('description',d_data);
                    });
                }
            });


        });

    </script>

@endpush