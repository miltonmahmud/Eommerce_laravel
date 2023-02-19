<div id="content">

  @livewire('admin.admin-sidebar')

  <main id="main" class="main">
     <section class="section product">
        <div class="row">
           <div class="col-lg-12">
              <div class="card">
                 <div class="card-header align-middle">
                   <span class="headline">All Banner</span>
                   <a href="{{route('admin.addhomepageBannerSecond')}}" type="button" class="btn btn-primary btn-md float-end">Add New Banner</a>
                </div>
                 <div class="card-body">
                    <table class="table table-striped">
                      <thead>
                          <tr>
                              <th>Id</th>
                              <th>Image</th>
                              <th>Title</th>
                              <th>Text</th>
                              <th>Subtitle</th>
                              <th>Link</th>
                              <th>Status</th>
                              <th>Date</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($homepageBannerSeconds as $homepageBannerSecond)
                              <tr>
                                  <td style="font-weight: 500;">{{$homepageBannerSecond->id}}</td>
                                  <td><img src="{{asset('assets/images/banners')}}/{{$homepageBannerSecond->image}}" width="40" height="40"></td>
                                  <td>{{$homepageBannerSecond->title}}</td>
                                  <td>{{$homepageBannerSecond->text}}</td>
                                  <td>{{$homepageBannerSecond->subtitle}}</td>
                                  <td>{{$homepageBannerSecond->link}}</td>
                                  <td>{{$homepageBannerSecond->status == 1 ? 'Active':'Inactive'}}</td>
                                  <td>{{$homepageBannerSecond->created_at}}</td>
                                  <td>

                                    <a href="{{route('admin.edithomepageBannerSecond', ['homepage_banner_second'=>$homepageBannerSecond->id])}}">
                                        <i class="bx bxs-edit" style="font-size: 28px"></i> 
                                      </a>
                                      <a href="" wire:click.prevent="deleteConfirmation({{$homepageBannerSecond->id}})" tyle="color: #FF324D;" style="margin-left:5px;">
                                        <i class="ri-close-circle-fill" style="font-size: 26px;"></i>
                                      </a>

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