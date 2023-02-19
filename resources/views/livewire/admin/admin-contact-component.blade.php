 <div id="content">

  @livewire('admin.admin-sidebar')
    
  <main id="main" class="main">
     <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                      <div class="card">
                            <div class="card-header align-middle">
                               <span class="headline">All Messages</span>
                            </div>
                          <div class="card-body my-3">
                              @if(Session::has('message'))
                                  <div class="alert alert-success" role="alert">{{Session::get('message')}}
                                  </div>
                              @endif
                              <table class="table table-bordered">
                                 <thead class="table-primary">
                                     <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Subject</th>
                                        <th>Comment</th>
                                        <th>Created At</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     @php
                                          $i = 1;
                                      @endphp
                                      @foreach($contacts as $contact)
                                          <tr class="align-middle" style="font-size: 15px;">
                                              <td>{{$i++}}</td>
                                              <td>{{$contact->name}}</td>
                                              <td>{{$contact->email}}</td>
                                              <td>{{$contact->phone}}</td>
                                              <td>{{$contact->subject}}</td>
                                              <td>{{$contact->comment}}</td>
                                              <td>{{$contact->created_at}}</td>
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
