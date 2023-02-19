 
<div id="content">

  @livewire('admin.admin-sidebar')
    
  <main id="main" class="main">
     <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                      <div class="card">
                            <div class="card-header align-middle">
                               <span class="headline">All Attributes</span>
                               <a href="{{route('admin.add_attribute')}}" type="button" class="btn btn-primary float-end">Add New</a>
                            </div>
                          <div class="card-body my-3">
                              @if(Session::has('message'))
                                  <div class="alert alert-success" role="alert">{{Session::get('message')}}
                                  </div>
                              @endif
                              <table class="table table-bordered">
                                <thead class="table-primary">
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                      @foreach ($pattributes as $pattribute)
                                      <tr class="align-middle" style="font-size: 15px;">
                                          <td style="font-weight: 500;">{{$pattribute->id}}</td>
                                          <td>{{$pattribute->name}}</td>
                                          <td>{{$pattribute->created_at}}</td>
                                          <td>
      <a href="{{route('admin.edit_attribute',['attribute_id'=>$pattribute->id])}}"><i class="bx bxs-edit" style="font-size: 28px"></i></a>
  <a href="#" wire:click.prevent="deleteAtt({{$pattribute->id}})" style="margin-left: 5px;" ><i class="ri-close-circle-fill" style="font-size: 26px;"></i></a>
                                          </td>
                                      </tr>
                                      @endforeach
                                </tbody>
                           </table>
                          </div>
                      </div>
                </div>
            </div>
        </div>
     </section>
  </main>
</div>
