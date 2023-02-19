<div id="content">

@livewire('admin.admin-sidebar')

  <main id="main" class="main">
     <section class="section dashboard">
        <div class="row">
           <div class="col-lg-12">
              <div class="card">
                 <div class="card-header align-middle">
                   <span class="headline">All Categories</span>
                   <a href="{{route('admin.addcategory')}}" type="button" class="btn btn-primary float-end">Add New</a>
                </div>
                 <div class="card-body my-3">
                    @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('message')}}
                        </div>
                    @endif
                     <table class="table table-bordered">
                          <thead class="table-primary">
                              <tr>
                                  <th>Id</th>
                                  <th>Category Name</th>
                                  <th>Slug</th>
                                  <th>Sub Category</th>
                                  <th>Action</th>
                              </tr>
                          </thead>
                          <tbody>
                                @foreach ($categories as $category)
                                <tr class="align-middle" style="font-size: 15px;">
                                    <td style="font-weight: 500;">{{$category->id}}</td>
                                    <td style="text-transform: capitalize;font-weight: 600;">{{$category->name}}</td>
                                    <td>{{$category->slug}}</td>
                                     <td class="align-middle">
                                        <ul class="sclist ">
                                            @foreach($category->subCategories as $scategory)
                                                <li><i class="fa fa-caret-right"></i> {{$scategory->name}} 
                                                    <a href="{{route('admin.editcategory',['category_slug'=>$category->slug,'scategory_slug'=>$scategory->slug])}}" class="slink"><i class="bx bxs-edit"></i></i></a>
                                                     <a href="#" wire:click.prevent="deleteSubcategory({{$scategory->id}})" class="slink" ><i class="ri-close-circle-fill"></i></a>
                                                </li>
                                            @endforeach
                                        </ul>
                                     </td>
                                    <td>
                                      <a href="{{route('admin.editcategory',['category_slug'=>$category->slug])}}"><i class="bx bxs-edit" style="font-size: 28px"></i>
                                      </a>
                                      <a href="#" style="margin-left: 5px;" wire:click.prevent="deleteCategory({{$category->id}})"><i class="ri-close-circle-fill" style="font-size: 26px;"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                          </tbody>
                     </table>
                 </div>
              </div>
           </div>
        </div>
     </section>
  </main>
</div>