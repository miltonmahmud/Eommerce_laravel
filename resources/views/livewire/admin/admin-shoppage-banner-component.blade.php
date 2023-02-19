<div id="content">

  @livewire('admin.admin-sidebar')

  <main id="main" class="main">
     <section class="section product">
        <div class="row">
           <div class="col-lg-12">
              <div class="card">
                 <div class="card-header align-middle">
                   <span class="headline">All Banner</span>
                   <a href="{{route('admin.addshoppageBanner')}}" type="button" class="btn btn-primary btn-md float-end">Add New</a>
                </div>
                 <div class="card-body my-3">
                    <table class="table table-striped">
                      <thead>
                          <tr>
                              <th>Id</th>
                              <th>Image</th>
                              <th>Title</th>
                              <th>Subtitle</th>
                              <th>Link</th>
                              <th>Status</th>
                              <th>Date</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($ShoppageBanner as $ShoppageBanner)
                              <tr>
                                  <td style="font-weight: 500;">{{$ShoppageBanner->id}}</td>
                                  <td><img src="{{asset('assets/images/banners')}}/{{$ShoppageBanner->image}}" width="40" height="40"></td>
                                  <td>{{$ShoppageBanner->title}}</td>
                                  <td>{{$ShoppageBanner->subtitle}}</td>
                                  <td>{{$ShoppageBanner->link}}</td>
                                  <td>{{$ShoppageBanner->status == 1 ? 'Active':'Inactive'}}</td>
                                  <td>{{$ShoppageBanner->created_at}}</td>
                                  <td>
                                      <a href="{{route('admin.editshoppageBanner', ['shoppage_Banner_id'=>$ShoppageBanner->id])}}"><i class="bx bxs-edit" style="font-size: 28px"></i> </a><a href="#"  style="margin-left:10px;" wire:click.prevent="deleteConfirmation({{$ShoppageBanner->id}})"><i class="ri-close-circle-fill" style="font-size: 26px;"></i></a>

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