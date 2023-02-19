<div id="content">

  @livewire('admin.admin-sidebar')
    
  <main id="main" class="main">
     <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                      <div class="card">
                            <div class="card-header align-middle">
                               <span class="headline">All Subscribers</span>
                            </div>
                          <div class="card-body">
                              @if(Session::has('message'))
                                  <div class="alert alert-success" role="alert">{{Session::get('message')}}
                                  </div>
                              @endif
                              <table class="table table-bordered">
                              <thead class="table-primary">
                                  <tr>
                                      <th>Id</th>
                                      <th>Email</th>
                                      <th>Date</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach ($subscribers as $subscriber)
                                      <tr class="align-middle" style="font-size: 15px;">
                                          <td>{{$subscriber->id}}</td>
                                          <td style="font-weight: 600;">{{$subscriber->email}}</td>
                                          <td>{{$subscriber->created_at}}</td>
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
