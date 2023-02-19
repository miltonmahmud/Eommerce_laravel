 <div id="content">

  @livewire('admin.admin-sidebar')
    
  <main id="main" class="main">
     <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                      <div class="card">
                            <div class="card-header align-middle">
                               <span class="headline">All Popups</span>
                               <a href="{{route('admin.addPopup')}}" type="button" class="btn btn-primary float-end">Add New</a>
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
                                      <th>Image</th>
                                      <th>Title</th>
                                      <th>Subtitle</th>
                                      <th>Status</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach ($popups as $Popup)
                                      <tr class="align-middle" style="font-size: 15px;">
                                          <td style="font-weight: 500;">{{$Popup->id}}</td>
                                          <td><img src="{{asset('assets/images/banners')}}/{{$Popup->image}}" width="40" height="40"></td>
                                          <td style="text-transform: capitalize; font-weight: 600;">{{$Popup->title}}</td>
                                          <td>{{$Popup->subtitle}}</td>
                                          <td>{{$Popup->status == 1 ? 'Active':'Inactive'}}</td>
                                          <td>
                                              <a href="{{route('admin.editPopup', ['Popup_id'=>$Popup->id])}}"><i class="bx bxs-edit" style="font-size: 28px"></i></a><a href="javascript:void(0)"  style="margin-left:5px;" wire:click.prevent="deleteConfirmation({{$Popup->id}})"><i class="ri-close-circle-fill" style="font-size: 26px;"></i></a>

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
